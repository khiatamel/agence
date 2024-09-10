<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhoneVerificationController extends Controller
{
    public function verify(Request $request)
    {
        $request->validate([
            'verification_code' => ['required', 'string', 'max:6'],
        ]);

        $user = Auth::user();

        // Assurez-vous que le code de vérification correspond
        if ($request->verification_code == $user->verification_code) {
            // Marquez le téléphone comme vérifié
            $user->phone_verified_at = now();
            $user->save();

            return redirect()->route('dashboard')->with('status', 'Votre numéro de téléphone a été vérifié avec succès.');
        } else {
            return back()->withErrors(['verification_code' => 'Le code de vérification est incorrect.']);
        }
    }
}
