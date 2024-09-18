<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Omra; 
use App\Models\Hotel; 
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

    public function afficherAgence()
    {
        $omras = Omra::all();
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

        return redirect()->route('omra.index')->with('success', 'Omra created successfully.');
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

        return redirect()->route('omra.index')->with('success', 'Omra updated successfully.');
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
        $omra = Omra::findOrFail($id);

        // Optionally, delete the associated photo
        if ($omra->photo && file_exists(public_path('storage/images/' . $omra->photo))) {
            unlink(public_path('storage/images/' . $omra->photo));
        }

        $omra->delete();

        return redirect()->route('omra.index')->with('success', 'Omra deleted successfully.');
    }
}
