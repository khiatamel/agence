<?php

namespace App\Http\Controllers;

use App\Models\ReservationOmra;
use App\Models\Omra; // Assurez-vous d'importer les modèles nécessaires
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ReservationOmraController extends Controller
{

    public function index($id)
    {
        $omra = Omra::findOrFail($id);
        $reservation_omras = ReservationOmra::all();   // Retrieve all Omra records
        return view('agence.reservation', compact('reservation_omras','omra'));
    }

    public function afficherReservation()
{
    // Get the authenticated user's ID
    $userId = Auth::id();

    // Fetch reservations where the user_id matches the authenticated user's ID
    $reservation_omras = ReservationOmra::where('user_id', $userId)->get();

    // Optionally, fetch other data, like available Omras
    $omras = Omra::all(); // Adjust as needed

    return view('agence.listReservation', compact('reservation_omras', 'omras'));
}


    // Méthode pour créer une nouvelle réservation Omra
    public function store(Request $request)
{
    // Valider les données du formulaire
    $request->validate([
        'nom' => 'required|string|max:255',
        'numero' => 'required|string|max:20',
        'passeport' => 'nullable|file|mimes:jpeg,jpg,png,pdf', // Passeport : Image ou PDF
        'photo' => 'nullable|file|mimes:jpeg,jpg,png,pdf',     // Photo : Image ou PDF
        'age' => 'nullable|integer',
        'hotel' => 'required|string',
        'group_name' => 'nullable|string|max:255',
        'omraID' => 'required|exists:omra_hotels,id',
    ]);

    // Gérer le fichier passeport
    $passeportPath = $request->file('passeport') ? $request->file('passeport')->store('passeports', 'public') : null;

    // Gérer le fichier photo
    $photoPath = $request->file('photo') ? $request->file('photo')->store('photos', 'public') : null;

    // Créer une réservation Omra
    ReservationOmra::create([
        'nom' => $request->nom,
        'numero' => $request->numero,
        'passeport' => $passeportPath, 
        'photo' => $photoPath,
        'age' => $request->age,
        'group_name' => $request->group_name,
        'omraID' => $request->omraID,
        'user_id' => auth()->user()->id, // Associer l'utilisateur connecté
        'hotel' => $request->hotel,
    ]);

    $omra = Omra::find($request->omraID);
    
    // Vérifier si l'Omra existe
    if ($omra) {
        $omra->place--;
        $omra->save(); // Sauvegarder les modifications dans Omra
    }

    return redirect()->back()->with('success', 'Réservation créée avec succès.');
}


    public function update(Request $request, $id)
{
    // Récupérer la réservation
    $reservation = ReservationOmra::findOrFail($id);

    // Validation des données
    $validated = $request->validate([
        'group_name' => 'nullable|string|max:255',
        'nom' => 'required|string|max:255',
        'numero' => 'required|string|max:20',
        'passeport' => 'nullable|file|mimes:jpeg,jpg,png,pdf', // Passeport : Image ou PDF
        'photo' => 'nullable|file|mimes:jpeg,jpg,png,pdf',     // Photo : Image ou PDF
        'age' => 'nullable|integer',
        'omraID' => 'required|exists:omra_hotels,id'
    ]);

    // Gérer le fichier passeport
    if ($request->hasFile('passeport')) {
        // Supprimer l'ancien fichier si un nouveau est uploadé
        if ($reservation->passeport) {
            Storage::delete('public/' . $reservation->passeport);
        }
        $validated['passeport'] = $request->file('passeport')->store('passeports', 'public');
    }

    // Gérer le fichier photo
    if ($request->hasFile('photo')) {
        // Supprimer l'ancien fichier si un nouveau est uploadé
        if ($reservation->photo) {
            Storage::delete('public/' . $reservation->photo);
        }
        $validated['photo'] = $request->file('photo')->store('photos', 'public');
    }

    // Mettre à jour le statut
    $validated['statut'] = 'en cours de traitement';

    // Mise à jour de la réservation
    $reservation->update($validated);

    return redirect()->back()->with('success', 'Réservation mise à jour et en cours de traitement.');
}

public function accept($id)
{
    // Récupérer la réservation
    $reservation = ReservationOmra::find($id);

    // Modifier le statut à "accepté"
    $reservation->statut = 'accepté';

    // Récupérer l'Omra associée et décrémenter le nombre de places

    $reservation->save();

    return redirect()->back()->with('success', 'Réservation acceptée ');
}
public function refuse($id)
{
    // Récupérer la réservation
    $reservation = ReservationOmra::find($id);

    if ($reservation->statut == 'accepté') {
        $omra = Omra::find($reservation->omraID);
        
        // Vérifier si l'Omra existe
        if ($omra) {
            // Réduire le nombre de places disponibles
            $omra->place++;
            $omra->save(); // Sauvegarder les modifications dans Omra
        }
    }

    // Modifier le statut à "accepté"
    $reservation->statut = 'refusé';
    $reservation->save();

    return redirect()->back()->with('refusé', 'Réservation refusé');
}

public function viewAgencyReservations()
{
    // Get the logged-in agency user
    $agence = auth()->user(); // This is the authenticated user (agency)

    // Ensure the user is an agency
    if ($agence->role !== 'admin') {
        abort(403, 'Unauthorized');
    }

    // Get all reservations for each Omra belonging to the agency
    // ReservationController.php
    $omrasWithReservations = $agence->omras()
    ->with(['reservations' => function ($query) {
        $query->distinct(); // Ajout du distinct
    }])
    ->distinct() // S'assurer que les Omras sont uniques
    ->orderBy('id', 'desc') // Trie par ID (la plus récente d'abord)
    ->get();

    return view('agence.listReservation', compact('omrasWithReservations'));
}

    public function filterByUserRole(Request $request)
    {
        // Récupérer le rôle sélectionné
        $role = $request->input('role', 'all');

        // Récupérer l'Omra sélectionnée
        $selectedOmraId = $request->input('selected_omra');

        // Construire la requête de base pour les réservations
        $query = ReservationOmra::query(); // Commencer avec une requête vide

        // Filtrer par Omra si un ID est sélectionné
        if ($selectedOmraId) {
            $query->where('omraID', $selectedOmraId);
        }

        // Ajouter un filtre selon le rôle si un rôle spécifique est sélectionné
        if ($role !== 'all') {
            // Joindre la table des utilisateurs pour filtrer par rôle
            $query->join('users', 'reservation_omras.user_id', '=', 'users.id')
                  ->where('users.role', $role)
                  ->select('reservation_omras.*'); // Sélectionner uniquement les colonnes de la table `reservation_omras`
        } else {
            // Sélectionner uniquement les réservations sans filtrer par rôle
            $query->select('reservation_omras.*');
        }

        // Exécuter la requête et récupérer les réservations
        $reservation_omras = $query->get();

        // Récupérer toutes les Omras pour la sélection
        $omras = Omra::all();

        // Retourner la vue avec les données nécessaires
        return view('agence.listReservation', [
            'reservation_omras' => $reservation_omras,
            'omras' => $omras,
            'selected_omra' => $selectedOmraId,
        ]);
    }

    public function filterReservationsByOmra($omraId)
{
    // Récupérer l'utilisateur connecté
    $userId = Auth::user()->id;

    // Récupérer les réservations pour cet utilisateur et cette Omra
    $reservations = ReservationOmra::where('omraID', $omraId)
        ->where('user_id', $userId)
        ->get();

    // Afficher les résultats pour le débogage
    if ($reservations->isEmpty()) {
        return response()->json(['message' => 'Aucune réservation trouvée.']);
    }

    return response()->json($reservations);
}

    

    // Méthode pour supprimer une réservation existante
    public function destroy($id)
{
    // Récupérer la réservation à supprimer
    $reservation = ReservationOmra::findOrFail($id);

    // Supprimer les fichiers associés
    if ($reservation->passeport) {
        Storage::delete('public/' . $reservation->passeport);
    }

    if ($reservation->photo) {
        Storage::delete('public/' . $reservation->photo);
    }

    // Suppression de la réservation
    $reservation->delete();

    return redirect()->back()->with('success', 'Réservation Omra supprimée avec succès.');
}

}
