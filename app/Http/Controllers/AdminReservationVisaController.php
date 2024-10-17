<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ReservationVisa;
use App\Models\ReservationPersonneVisa;
use Illuminate\Http\Request;

class AdminReservationVisaController extends Controller
{
    /**
     * Display a listing of the reservations.
     */
    public function index()
    {
        // Fetch all reservations with related reservation persons and files
        $reservations = ReservationVisa::with(['reservationPersonnes.files', 'demandeVisa'])->get();
    
        return view('visaAdmin.visaAdmin', compact('reservations'));
    }
    
    /**
     * Show the form for editing a specific reservation person.
     *
     * @param int $id
     */
    public function edit($id)
    {
        // Fetch the specific person reservation to edit
        $reservationPersonne = ReservationPersonneVisa::with('files')->findOrFail($id);

        return view('admin.reservations.edit', compact('reservationPersonne'));
    }

    
    /**
     * Update the specific reservation person in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
   
     public function update(Request $request, $id)
     {
         // Validate the input data
         $request->validate([
             'nom' => 'required|string|max:255',
             'prix' => 'required|numeric',
             'status' => 'required|string|in:accepted,refused',
         ]);
 
         // Find the ReservationPersonne by id
         $personne = ReservationPersonneVisa::findOrFail($id);
 
         // Update the fields
         $personne->nom = $request->input('nom');
         $personne->prix = $request->input('prix');
         $personne->status = $request->input('status');
 
         // Save the changes
         $personne->save();
 
         // Redirect back with a success message
         return redirect()->back()->with('success', 'La réservation a été mise à jour avec succès.');
     }

    /**
     * Remove the specific reservation person from storage.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        // Find the specific reservation person and delete
        $reservationPersonne = ReservationPersonneVisa::findOrFail($id);
        $reservationPersonne->delete();

        return redirect()->route('admin.reservation.index')->with('success', 'Personne supprimée avec succès');
    }
}
