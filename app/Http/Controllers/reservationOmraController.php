<?php

namespace App\Http\Controllers;

use App\Models\ReservationOmra;
use App\Models\Omra; // Assurez-vous d'importer les modèles nécessaires
use Illuminate\Http\Request;

class ReservationOmraController extends Controller
{
    // Méthode pour créer une nouvelle réservation Omra
    public function store(Request $request)
{
    // Validation des données d'entrée
    $validated = $request->validate([
        'group_name' => 'nullable|string',
        'nom' => 'required|string|max:255',
        'numero' => 'required|string|max:20',
        'passeport' => 'required|string|max:20',
        'photo' => 'required|image|max:2048',
        'age' => 'required|integer',
        'omraID' => 'required|exists:omra_hotels,id'
    ]);

    // Gestion de l'upload de la photo
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('photos', 'public');
        $validated['photo'] = $photoPath;
    }

    // Ajouter le statut par défaut
    $validated['statut'] = 'en cours d\'examen';

    // Création de la réservation
    ReservationOmra::create($validated);

    return redirect()->back()->with('success', 'Réservation Omra créée et en cours d\'examen');
}

    // Méthode pour mettre à jour une réservation existante
    public function update(Request $request, $id)
{
    // Récupération de la réservation à modifier
    $reservation = ReservationOmra::findOrFail($id);

    // Validation des nouvelles données
    $validated = $request->validate([
        'group_name' => 'nullable|string',
        'nom' => 'required|string|max:255',
        'numero' => 'required|string|max:20',
        'passeport' => 'required|string|max:20',
        'photo' => 'sometimes|image|max:2048',
        'age' => 'required|integer',
        'omraID' => 'required|exists:omra_hotels,id'
    ]);

    // Si une nouvelle photo est téléchargée
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('photos', 'public');
        $validated['photo'] = $photoPath;
    }

    // Lorsque le client modifie, le statut redevient "en cours d'examen"
    $validated['statut'] = 'en cours d\'examen';

    // Mise à jour de la réservation
    $reservation->update($validated);

    return redirect()->back()->with('success', 'Réservation mise à jour et en cours d\'examen');
}


public function accept($id)
{
    // Récupérer la réservation
    $reservation = ReservationOmra::findOrFail($id);

    // Modifier le statut à "accepté"
    $reservation->update(['statut' => 'accepté']);

    return redirect()->back()->with('success', 'Réservation acceptée avec succès');
}

    // Méthode pour supprimer une réservation existante
    public function destroy($id)
    {
        // Récupération de la réservation à supprimer
        $reservation = ReservationOmra::findOrFail($id);

        // Suppression de la réservation
        $reservation->delete();

        return redirect()->back()->with('success', 'Réservation Omra supprimée avec succès');
    }
}
