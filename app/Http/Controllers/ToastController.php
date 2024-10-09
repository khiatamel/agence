<?php

namespace App\Http\Controllers;

use App\Models\OmraHotel; // Assurez-vous d'importer votre modèle
use Illuminate\Http\Request;

use App\Models\Omra; 
use App\Models\Hotel; 

class ToastController extends Controller
{
    // Méthode pour afficher la page avec les toasts
    public function index()
    {
        
        $hotels = Hotel::all(); // Retrieve all hotels from the database
        $omras = Omra::all();   // Retrieve all Omra records
        return view('AjouterOmra', compact('omras', 'hotels'));
    }

    // Méthode pour supprimer un hôtel
    public function destroy($id)
    {
        try {
            // Essayez de trouver l'OmraHotel
            $omraHotel = Omra::findOrFail($id);
            $omraHotel->delete();

            // Définir un message de succès
            session()->flash('success', 'Omra a été supprimé avec succès !');
        } catch (\Illuminate\Database\QueryException $ex) {
            // Vérifiez si l'erreur est due à une contrainte de clé étrangère
            if ($ex->getCode() == 23000) {
                // Définir un message d'erreur
                session()->flash('error', 'Impossible de supprimer Omra. Il est lié à des réservations existantes.');
            } else {
                // Pour d'autres types d'erreurs
                session()->flash('error', 'Une erreur est survenue lors de la suppression. Veuillez réessayer.');
            }
        } catch (\Exception $e) {
            // Gestion d'autres exceptions potentielles
            session()->flash('error', 'Une erreur inattendue est survenue : ' . $e->getMessage());
        }

        // Rediriger vers la route d'index des OmraHotels
        return redirect()->route('omra.index'); // Remplacez 'omra.index' par votre route appropriée
    }

    // Méthode pour simuler une opération réussie
    public function success(Request $request)
    {
        session()->flash('success', 'L\'opération a réussi avec succès !');
        return redirect()->route('omra.index'); // Redirection vers l'index
    }

    // Méthode pour simuler une erreur
    public function error(Request $request)
    {
        session()->flash('error', 'Une erreur est survenue. Veuillez réessayer.');
        return redirect()->route('omra.index'); // Redirection vers l'index
    }

    // Méthode pour simuler un avertissement
    public function warning(Request $request)
    {
        session()->flash('warning', 'Attention : Vérifiez vos données avant de continuer.');
        return redirect()->route('omra.index'); // Redirection vers l'index
    }
}
