<?php

namespace App\Http\Controllers;

use App\Models\Visa;
use App\Models\TypeVisa;
use App\Models\DossierVisa;
use Illuminate\Http\Request;

class VisaController extends Controller
{
    // Afficher tous les visas
    public function index()
    {
        $visas = Visa::with('typeVisas.dossierVisas')->get();
        return view('visas.index', compact('visas'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('visas.create');
    }

    // Stocker un nouveau visa, types et dossiers
    public function store(Request $request)
    {
        $validated = $request->validate([
            'destination' => 'required|unique:visas',
            'types' => 'required|array',
            'types.*.type' => 'required|distinct',
            'types.*.dossiers' => 'required|array',
            'types.*.dossiers.*' => 'required|string',
        ]);

        // Créer le visa
        $visa = Visa::create(['destination' => $validated['destination']]);

        // Ajouter les types et dossiers
        foreach ($validated['types'] as $typeData) {
            $typeVisa = new TypeVisa([
                'visa_id' => $visa->id,
                'type' => $typeData['type']
            ]);
            $visa->typeVisas()->save($typeVisa);

            foreach ($typeData['dossiers'] as $dossier) {
                $dossierVisa = new DossierVisa([
                    'type_visa_id' => $typeVisa->id,
                    'dossier' => $dossier
                ]);
                $typeVisa->dossierVisas()->save($dossierVisa);
            }
        }

        return redirect()->route('visas.index')->with('success', 'Visa ajouté avec succès.');
    }

    // Afficher le formulaire de modification
    public function edit($id)
    {
        $visa = Visa::with('typeVisas.dossierVisas')->findOrFail($id);
        return view('visas.edit', compact('visa'));
    }

    // Mettre à jour le visa, types et dossiers
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'destination' => 'required|unique:visas,destination,'.$id,
            'types' => 'required|array',
            'types.*.type' => 'required|distinct',
            'types.*.dossiers' => 'required|array',
            'types.*.dossiers.*' => 'required|string',
        ]);

        $visa = Visa::findOrFail($id);
        $visa->update(['destination' => $validated['destination']]);

        // Supprimer anciens types et dossiers
        $visa->typeVisas()->each(function($typeVisa) {
            $typeVisa->dossierVisas()->delete();
            $typeVisa->delete();
        });

        // Ajouter les nouveaux types et dossiers
        foreach ($validated['types'] as $typeData) {
            $typeVisa = new TypeVisa([
                'visa_id' => $visa->id,
                'type' => $typeData['type']
            ]);
            $visa->typeVisas()->save($typeVisa);

            foreach ($typeData['dossiers'] as $dossier) {
                $dossierVisa = new DossierVisa([
                    'type_visa_id' => $typeVisa->id,
                    'dossier' => $dossier
                ]);
                $typeVisa->dossierVisas()->save($dossierVisa);
            }
        }

        return redirect()->route('visas.index')->with('success', 'Visa modifié avec succès.');
    }

    // Supprimer un visa, type et dossier
    public function destroy($id)
    {
        $visa = Visa::findOrFail($id);
        $visa->delete();

        return redirect()->route('visas.index')->with('success', 'Visa supprimé avec succès.');
    }
}
