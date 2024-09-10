<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Omra; 

class OmraController extends Controller
{
    // Show all records
    public function index()
    {
        $omras = Omra::all();
        return view('AjouterOmra', compact('omras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'type' => 'required',
            'depart' => 'required|date',
            'retour' => 'required|date',
            'place' => 'required|integer',
            'saison' => 'required|integer',
            'compagne' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        // Handle file upload
        if ($request->hasFile('photo')) {
            $fileName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $fileName);
            $omra->photo = $fileName;
            $omra->save();
        }

        // Create Omra
        Omra::create([
            'nom' => $request->nom,
            'type' => $request->type,
            'depart' => $request->depart,
            'retour' => $request->retour,
            'place' => $request->place,
            'saison' => $request->saison,
            'compagne' => $request->compagne,
            'photo' => $fileName ?? null,  // Store file name
        ]);

        return redirect()->route('omra.index')->with('success', 'Omra created successfully.');
    }

    public function edit($id)
    {
        $omra = Omra::findOrFail($id);

        // Return JSON response for AJAX request
        return response()->json($omra);
    }

    public function update(Request $request, $id)
    {
        $omra = Omra::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('photo')) {
            $fileName = time().'.'.$request->photo->extension();
            $request->photo->storeAs('public/photos', $fileName);
            $omra->photo = $fileName;
        }

        $omra->nom = $request->input('nom');
        $omra->type = $request->input('type');
        $omra->depart = $request->input('depart');
        $omra->retour = $request->input('retour');
        $omra->place = $request->input('place');
        $omra->saison = $request->input('saison');
        $omra->compagne = $request->input('compagne');
        $omra->save();

        return redirect()->route('omra.index')->with('success', 'Programme updated successfully.');
    }

    // Delete a specific record
    public function destroy($id)
    {
        $omra = Omra::findOrFail($id);
        $omra->delete();

        return redirect()->route('omra.index')->with('success', 'Omra deleted successfully.');
    }
}
