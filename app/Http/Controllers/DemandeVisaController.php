<?php

namespace App\Http\Controllers;

use App\Models\DemandeVisa;
use App\Models\TypeVisa;
use App\Models\Visa;
use App\Models\DossierVisa;
use Illuminate\Http\Request;

class DemandeVisaController extends Controller
{
    
    /**
     * Affiche le formulaire de création pour une demande de visa.
     */
    public function create()
    {
        // Récupérer toutes les destinations et types de visas
        $visas = Visa::all();
        $typesVisas = TypeVisa::all();

        // Retourner la vue avec les visas et types de visas disponibles
        return view('visa', compact('visas', 'typesVisas'));
    }

    /**
     * Enregistre la demande de visa dans la base de données.
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'destination' => 'required|string|max:255', // Validation pour la destination
            'type_visa_id' => 'required|exists:type_visas,id',
            'nb_adultes' => 'required|integer|min:1',
            'nb_enfants' => 'required|integer|min:0',
        ]);
    
        // Création d'une nouvelle demande de visa
        $demandeVisa = new DemandeVisa();
        $demandeVisa->destination = $request->destination; // Assurez-vous que cette ligne est bien exécutée
        $demandeVisa->type_visa_id = $request->type_visa_id;
        $demandeVisa->nb_adultes = $request->nb_adultes;
        $demandeVisa->nb_enfants = $request->nb_enfants;
        $demandeVisa->save();

        // Redirection avec un message de succès après l'enregistrement
        return redirect()->route('reservation.show', ['demandeVisa' => $demandeVisa->id])
        ->with('success', 'Votre demande a été envoyée avec succès !');
    }

    public function getTypesVisa($destination)
{
    // Récupérer les types de visa pour la destination donnée
    $typesVisa = TypeVisa::where('destination', $destination)->get();

    // Retourner les types de visa sous forme de JSON pour AJAX
    return response()->json($typesVisa);
}
    /**
     * Liste toutes les demandes de visa (pour l'admin ou la gestion future).
     */
    public function index()
    {
        // Récupérer toutes les demandes de visa
        $demandes = DemandeVisa::with('typeVisa')->get();

        // Retourner la vue avec la liste des demandes
        return view('demandeVisa.index', compact('demandes'));
    }

    /**
     * Affiche une demande de visa spécifique (optionnel).
     */
    public function show($id)
    {
        // Récupérer une demande spécifique
        $demande = DemandeVisa::with('typeVisa')->findOrFail($id);

        // Afficher les détails de cette demande
        return view('demandeVisa.show', compact('demande'));
    }

    /**
     * Supprimer une demande de visa (optionnel pour l'admin).
     */
    public function destroy($id)
    {
        // Trouver la demande à supprimer
        $demande = DemandeVisa::findOrFail($id);

        // Supprimer la demande
        $demande->delete();

        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'La demande a été supprimée avec succès.');
    }


    public function showReservationForm($demandeVisaId)
    {
        // Find the DemandeVisa by ID
        $demandeVisa = DemandeVisa::findOrFail($demandeVisaId);
        $totalPersonnes = $demandeVisa->nb_adultes + $demandeVisa->nb_enfants;
         // Fetch the demande visa record
        $demandeVisa = DemandeVisa::findOrFail($demandeVisaId);

    
        // Retrieve the type name from the type_visas table
        $typeVisa = TypeVisa::where('id', $demandeVisa->type_visa_id)->first();
    
        // Log or debug the type name to confirm
        \Log::info('Type Visa: ' . $typeVisa->type);
    
        // Retrieve dossiers by matching the 'type' column with the visa type name
        $dossiers = DossierVisa::where('type', $typeVisa->type)->get();
    
        return view('reserverVisa', compact('demandeVisa','dossiers', 'totalPersonnes'));
    }
    

}
