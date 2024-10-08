<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Omra;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    // Afficher le formulaire de gestion des commissions pour une Omra donnée
    public function createForOmra($omra_id)
    {
        $omra = Omra::findOrFail($omra_id);  // Récupérer les détails de l'Omra
        $commissions = Commission::where('omra', $omra_id)->get();  // Récupérer les commissions associées
        return view('agence.commission', compact('omra', 'commissions'));
    }

    // Enregistrer une nouvelle commission pour une Omra
    public function store(Request $request)
    {
        $request->validate([
            'condition' => 'required|string|max:255',
            'prix' => 'required|string|max:255',
            'omra_id' => 'required|exists:omras,id'
        ]);

        $commission = new Commission();
        $commission->condition = $request->condition;
        $commission->prix = $request->prix;
        $commission->omra = $request->omra_id;
        $commission->save();

        return redirect()->route('commissions.createForOmra', $request->omra_id)
                         ->with('success', 'Commission ajoutée avec succès.');
    }

    public function update(Request $request, $id)
{
    // Valider les données envoyées
    $validated = $request->validate([
        'prix' => 'required|numeric',
        'condition' => 'required|string',
    ]);

    try {
        // Rechercher la commission par son ID et la mettre à jour
        $commission = Commission::findOrFail($id);
        $commission->update([
            'prix' => $request->prix,
            'condition' => $request->condition,
        ]);

        return redirect()->back()->with('success', 'Commission mise à jour avec succès !');

    } catch (\Exception $e) {
        // En cas d'erreur, retourner un message d'erreur
        return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour.');
    }
}

    
    // Suppression d'une commission
    public function destroy($id)
    {
        $commission = Commission::findOrFail($id);
        $omra_id = $commission->omra;
        $commission->delete();

        return redirect()->route('commissions.createForOmra', $omra_id)
                         ->with('success', 'Commission supprimée avec succès.');
    }
}


