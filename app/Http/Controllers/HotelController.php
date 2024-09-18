<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\TarifHotel;
use App\Models\PhotoHotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{

    public function index()
{
    // Récupérer tous les hôtels
    $hotels = Hotel::all();

    // Passer les hôtels à la vue
    return view('AjouterHotel', compact('hotels'));
}

    public function create()
    {
        return view('hotel.create');
    }

    // Enregistrer un hôtel avec des photos et des tarifs
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:hotels',
            'adresse' => 'required',
            'desc' => 'required',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tarifs.*.condition' => 'required',
            'tarifs.*.prix' => 'required|numeric',
        ]);

        // Création de l'hôtel
        $hotel = Hotel::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'desc' => $request->desc,
            'petit_dejeuner' => $request->petit_dejeuner ?? false,
            'demi_pension' => $request->demi_pension ?? false,
            'pension_complete' => $request->pension_complete ?? false,
            'all_inclusive' => $request->all_inclusive ?? false,
            'all_insoft' => $request->all_insoft ?? false,
            'vue_mer' => $request->vue_mer ?? false,
        ]);

        // Enregistrer les tarifs
        foreach ($request->tarifs as $tarifData) {
            TarifHotel::create([
                'condition' => $tarifData['condition'],
                'prix' => $tarifData['prix'],
                'hotel' => $hotel->nom,
            ]);
        }

        // Enregistrer les photos
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $fileName = time() . '_' . $photo->getClientOriginalName();
                $photo->storeAs('public/images', $fileName);

                PhotoHotel::create([
                    'photo' => $fileName,
                    'hotel' => $hotel->nom,
                ]);
            }
        }

        return redirect()->route('hotels.index')->with('success', 'Hôtel, tarifs et photos ajoutés avec succès.');
    }

    public function show($id)
{
    $hotel = Hotel::with('tarifs', 'photos')->findOrFail($id);
    return view('hotel.index', compact('hotel'));
}
    public function edit($id)
{
    // Récupérer l'hôtel avec ses tarifs et ses photos
    $hotel = Hotel::with('tarifs', 'photos')->findOrFail($id);

    return view('hotel.edit', compact('hotel'));
}

public function update(Request $request, $id)
{
    $hotel = Hotel::findOrFail($id);

    // Validate the incoming request
    $request->validate([
        'nom' => 'required|string|max:255',
        'adresse' => 'required|string|max:255',
        'desc' => 'required|string',
        'tarifs.*.condition' => 'nullable|string',
        'tarifs.*.prix' => 'nullable|numeric',
        'tarifs_new.*.condition' => 'nullable|string',
        'tarifs_new.*.prix' => 'nullable|numeric',
        'photos_new.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Update hotel details
    $hotel->nom = $request->input('nom');
    $hotel->adresse = $request->input('adresse');
    $hotel->desc = $request->input('desc');
    // Make sure you provide a value for all required fields, such as:
    // $hotel->hotel = $request->input('hotel'); // Ensure this is set if it's required
    $hotel->save();

    // Delete marked tariffs
    if ($request->has('deleted_tarifs')) {
        TarifHotel::whereIn('id', $request->input('deleted_tarifs'))->delete();
    }

    // Update existing tariffs
    if ($request->has('tarifs')) {
        foreach ($request->input('tarifs') as $tarifId => $data) {
            $tarif = TarifHotel::findOrFail($tarifId);
            $tarif->condition = $data['condition'] ?? $tarif->condition;
            $tarif->prix = $data['prix'] ?? $tarif->prix;
            $tarif->save();
        }
    }

    // Add new tariffs
    if ($request->has('tarifs_new')) {
        foreach ($request->input('tarifs_new') as $data) {
            if (!empty($data['condition']) || isset($data['condition'])) {
                TarifHotel::create([
                    'hotel' => $hotel->nom,
                    'condition' => $data['condition'] ?? null,
                    'prix' => $data['prix'] ?? null,
                ]);
            }
        }
    }

    // Delete marked photos
    if ($request->has('deleted_photos')) {
        PhotoHotel::whereIn('id', $request->input('deleted_photos'))->delete();
    }

    // Add new photos
    if ($request->hasFile('photos_new')) {
        foreach ($request->file('photos_new') as $photo) {
            $fileName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('public/images', $fileName);

            PhotoHotel::create([
                'hotel' => $hotel->nom,
                'photo' => $fileName,
            ]);
        }
    }

    return redirect()->route('hotels.index')->with('success', 'Hôtel mis à jour avec succès');
}

    // Delete a specific record
    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        return redirect()->route('hotels.index')->with('success', 'Omra deleted successfully.');
    }
}

