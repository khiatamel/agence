<?php

namespace App\Http\Controllers;

use App\Models\ProgrammeOmra;
use Illuminate\Http\Request;

class ProgrammeOmraController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $programme_omras = ProgrammeOmra::all(); // Fetch all records from the database
        return view('programmeOmra', compact('programme_omras')); // Pass the data to the view
    }
    
    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'départ' => 'required|date',
            'retour' => 'required|date',
            'heurD' => 'required|date_format:H:i',
            'heurR' => 'required|date_format:H:i',
            'nvD' => 'required|string',
            'nvR' => 'required|string',
            'parcourtD' => 'required|string',
            'parcourtR' => 'required|string',
            'compagne' => 'required|string',
        ]);

        ProgrammeOmra::create($request->all());
        return redirect()->route('programme_omras.index')->with('success', 'Programme Omra a été créée avec succès.');
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
    $programme_omra = ProgrammeOmra::findOrFail($id);

    // Return JSON response for AJAX request
    return response()->json($programme_omra);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $programmeOmra = ProgrammeOmra::find($id);

    	$programmeOmra->départ = $request->input('départ');
        $programmeOmra->retour = $request->input('retour');
        $programmeOmra->heurD = $request->input('heurD');
        $programmeOmra->heurR = $request->input('heurR');
        $programmeOmra->nvD = $request->input('nvD');
        $programmeOmra->nvR = $request->input('nvR');
        $programmeOmra->parcourtD = $request->input('parcourtD');
        $programmeOmra->parcourtR = $request->input('parcourtR');
        $programmeOmra->compagne = $request->input('compagne');
        $programmeOmra->save();

        return redirect()->route('programme_omras.index')->with('success', 'Programme Omra a été modifier avec succès.');
    }
    

    // Remove the specified resource from storage.
    public function destroy(ProgrammeOmra $programmeOmra)
    {
        $programmeOmra->delete();
        return redirect()->route('programme_omras.index')->with('success', 'Programme Omra a été supprimer avec succès.');
    }
}
