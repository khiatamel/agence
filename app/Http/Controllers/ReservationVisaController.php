<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reservationVisa;
use App\Models\ReservationPersonneVisa;
use App\Models\ReservationFichierVisa;
use App\Models\DemandeVisa;
use App\Models\DossierVisa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ReservationVisaController extends Controller
{
    
    public function showReservationForm($demandeVisaId)
    {
        $demandeVisa = DemandeVisa::findOrFail($demandeVisaId);
        $totalPersonnes = $demandeVisa->nb_adultes + $demandeVisa->nb_enfants;
        
        // Retrieve all visa-related dossier requirements
        $dossiers = DossierVisa::where('type', $demandeVisa->type_visa_id)->get();
        
        return view('reserverVisa', compact('dossiers', 'totalPersonnes'));
    }

    public function storeReservation(Request $request)
{
    // Validate the request data
    $validated = $request->validate([
        'noms.*' => 'required|string', // Validate full name
        'fichiers.*.*' => 'required|file', // Validate files
    ]);

    // Get the corresponding 'demandeVisa' record
    $demandeVisa = DemandeVisa::findOrFail($request->input('demande_visa_id'));

    // Create a new reservation
    $reservation = ReservationVisa::create([
        'user_id' => Auth::id(),
        'demande_visa_id' => $demandeVisa->id,
        'total_personnes' => $demandeVisa->nb_adultes + $demandeVisa->nb_enfants,
    ]);

    // Loop through the persons and their associated files
    foreach ($request->noms as $personIndex => $nomComplet) {
        // Create a record for each person in the reservation
        $reservationPersonne = ReservationPersonneVisa::create([
            'reservation_id' => $reservation->id,
            'nom' => $nomComplet, // Assign the full name
        ]);

        // Save each file for this person
        foreach ($request->fichiers[$personIndex] as $dossierId => $file) {
            // Handle file storage
            $filePath = $file->store('reservations');
            
            // Create the record in the 'reservation_fichiers_visas' table
            ReservationFichierVisa::create([
                'reservation_personne_id' => $reservationPersonne->id,
                'dossier_visa_id' => $dossierId,
                'fichier' => $filePath,
            ]);
        }
    }

    // Redirect with success message
    return redirect()->route('reservation.form', ['demandeVisaId' => $demandeVisa->id])
                     ->with('success', 'Réservation effectuée avec succès.');
}
             

}
