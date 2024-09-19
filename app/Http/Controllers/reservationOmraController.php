<?php

namespace App\Http\Controllers;

use App\Models\ReservationOmra;
use App\Models\Omra; // Assurez-vous d'importer les modèles nécessaires
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReservationOmraController extends Controller
{

    public function index($id)
    {
        $omra = Omra::findOrFail($id);
        $reservation_omras = ReservationOmra::all();   // Retrieve all Omra records
        return view('agence.reservation', compact('reservation_omras','omra'));
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
    $reservation->save();

    return redirect()->back()->with('success', 'Réservation acceptée ');
}
public function refuse($id)
{
    // Récupérer la réservation
    $reservation = ReservationOmra::find($id);

    // Modifier le statut à "accepté"
    $reservation->statut = 'refusé';
    $reservation->save();

    return redirect()->back()->with('refusé', 'Réservation refusé');
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
