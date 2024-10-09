<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Omra; 
use App\Models\Hotel; 
use App\Models\ReservationOmra; 
use Illuminate\Support\Facades\DB;

class OmraController extends Controller
{
    // Show all records
    public function index()
    {
        $hotels = Hotel::all(); // Retrieve all hotels from the database
        $omras = Omra::all();   // Retrieve all Omra records
        
        return view('AjouterOmra', compact('omras', 'hotels'));
    }

    public function afficher()
    {
        $omras = Omra::all();
        return view('Omra', compact('omras'));
    }

    public function getDetails($id)
    {
        // Check if the provided Omra ID exists in the table and log the query
        \Log::info("Looking for reservations with omraID: " . $id);
    
        // Attempt to find reservations by Omra ID
        $reservation_omras = ReservationOmra::where('omraID', $id)->get();
    
        // Check if reservations are found and log the count
        if ($reservation_omras->isEmpty()) {
            \Log::info('No reservations found for Omra ID: ' . $id);
            return response()->json(['error' => 'No reservations found for this Omra'], 404);
        }
    
    
        // Return the reservations as JSON
        return response()->json($reservation_omras);
    }
    
    public function dash(Request $request)
{
    // Récupérer le rôle sélectionné (ou 'all' par défaut)
    $role = $request->input('role', 'all');

    // Récupérer l'Omra sélectionnée
    $selectedOmraId = $request->input('selected_omra');

    // Commencer la requête de base pour les réservations
    $query = ReservationOmra::query();

    // Filtrer par Omra si un ID est sélectionné
    if ($selectedOmraId) {
        $query->where('omraID', $selectedOmraId);
    }

    // Ajouter un filtre selon le rôle si un rôle spécifique est sélectionné
    if ($role !== 'all') {
        // Joindre la table `users` pour filtrer par rôle
        $query->join('users', 'reservation_omras.user_id', '=', 'users.id')
              ->where('users.role', $role)
              ->select('reservation_omras.*'); // Sélectionner uniquement les colonnes de `reservation_omras`
    }

    // Exécuter la requête pour récupérer les réservations
    $reservation_omras = $query->get();

    // Récupérer toutes les Omras pour la sélection
    $omras = Omra::all();

    // Retourner la vue avec les données nécessaires
    return view('dash', [
        'reservation_omras' => $reservation_omras,
        'omras' => $omras,
        'selected_omra' => $selectedOmraId,
    ]);
}

    public function afficherAgence()
    {
        $omras = Omra::with('commissions')->get(); // Assurez-vous que la relation est définie dans le modèle Omra
        return view('agence.presentation', compact('omras'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nom' => 'required',
        'type' => 'required',
        'depart' => 'required|date',
        'retour' => 'required|date',
        'place' => 'required|integer',
        'saison' => 'required|integer',
        'compagne' => 'required|string',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',  // Validate image
        'hotels' => 'required|array', // Ensure hotels are selected
    ]);

    try {
        // Handle the image upload
        if ($request->hasFile('photo')) {
            $fileName = time().'.'.$request->photo->extension();
            $request->photo->storeAs('public/images', $fileName);
        } else {
            $fileName = null;
        }

        // Create Omra
        $omra = Omra::create([
            'nom' => $validated['nom'],
            'type' => $validated['type'],
            'depart' => $validated['depart'],
            'retour' => $validated['retour'],
            'place' => $validated['place'],
            'saison' => $validated['saison'],
            'compagne' => $validated['compagne'],
            'photo' => $fileName,
        ]);

        // Attach selected hotels to Omra
        $omra->hotels()->attach($validated['hotels']);  // Add hotels using pivot table

        // Success message
        session()->flash('success', 'L\'Omra a été créée avec succès.');
    } catch (\Exception $e) {
        // If any error occurs, flash error message
        session()->flash('error', 'Une erreur est survenue lors de la création de l\'Omra.');
        return redirect()->back()->withErrors($e->getMessage());
    }

    return redirect()->route('omra.index');
}
 

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required',
            'type' => 'required',
            'depart' => 'required|date',
            'retour' => 'required|date',
            'place' => 'required|integer',
            'saison' => 'required|integer',
            'compagne' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hotels' => 'required|array',
        ]);

        $omra = Omra::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('photo')) {
            // Delete old photo if necessary
            if ($omra->photo && file_exists(public_path('storage/images/' . $omra->photo))) {
                unlink(public_path('storage/images/' . $omra->photo));
            }
    
            $fileName = time().'.'.$request->photo->extension();
            $request->photo->storeAs('public/images', $fileName);
            $omra->photo = $fileName;
        }

        
        // Update Omra details
        $omra->update([
            'nom' => $validated['nom'],
            'type' => $validated['type'],
            'depart' => $validated['depart'],
            'retour' => $validated['retour'],
            'place' => $validated['place'],
            'saison' => $validated['saison'],
            'compagne' => $validated['compagne'],
        ]);

        // Sync hotels (remove old relationships and add new ones)
        $omra->hotels()->sync($validated['hotels']);  // Sync hotels with the updated list

        return redirect()->route('omra.index')->with('success', 'Omra a été modifier avec succès.');
    }

    public function détail($id)
    {
        $omra = Omra::with(['hotels.tarifs', 'hotels.photos'])->findOrFail($id);

        $programme = DB::table('programme_omras')
        ->where('départ', $omra->depart)
        ->where('retour', $omra->retour)
        ->where('compagne', $omra->compagne)
        ->first(['parcourtD', 'parcourtR']);


        // Return JSON response for AJAX request
        return view('modelOmra', compact('omra','programme'));
    }

    // Delete a specific record
    public function destroy($id)
    {
        try {
            // Essayez de trouver l'Omra
            $omra = Omra::findOrFail($id); // Utiliser findOrFail pour lancer une exception si non trouvé
            $omra->delete();
    
            // Définir un message de succès
            session()->flash('success', 'L\'hôtel a été supprimé avec succès !');
        } catch (\Illuminate\Database\QueryException $ex) {
            // Vérifiez si l'erreur est due à une contrainte de clé étrangère
            if ($ex->getCode() == 23000) {
                // Définir un message d'erreur
                session()->flash('error', 'Impossible de supprimer l\'hôtel. Il est lié à des réservations existantes.');
            } else {
                // Pour d'autres types d'erreurs
                session()->flash('error', 'Une erreur est survenue. Veuillez réessayer.');
            }
        } catch (\Exception $e) {
            // Gestion d'autres exceptions
            session()->flash('error', 'Une erreur inattendue est survenue : ' . $e->getMessage());
        }
    
        // Redirige vers la route d'index des toasts ou d'hôtels après la suppression
        return redirect()->route('toasts.index'); // Remplacez 'toasts.index' par votre route appropriée
    }
    
    // Méthode pour simuler une opération réussie
    public function success(Request $request)
    {
        session()->flash('success', 'L\'opération a réussi avec succès !');
        return redirect()->route('toasts.success');
    }
    
    // Méthode pour simuler une erreur
    public function error(Request $request)
    {
        session()->flash('error', 'Une erreur est survenue. Veuillez réessayer.');
        return redirect()->route('toasts.error');
    }
    
    // Méthode pour simuler un avertissement
    public function warning(Request $request)
    {
        session()->flash('warning', 'Attention : Vérifiez vos données avant de continuer.');
        return redirect()->route('toasts.warning');
    }
}    