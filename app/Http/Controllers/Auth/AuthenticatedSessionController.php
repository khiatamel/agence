<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    // Afficher la vue de connexion
    public function create(): View
    {
        return view('auth.login');
    }

    // Gérer la demande d'authentification
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return $this->authenticated($request, Auth::user());
    }

    // Gérer la destruction de la session d'authentification
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    // Cette méthode est appelée après que l'utilisateur est authentifié
    protected function authenticated(Request $request, $user)
    {
        // Redirection personnalisée en fonction du type d'utilisateur
        if ($user->isAdmin()) {
            return redirect()->route('dash');
        } elseif ($user->isDirection()) {
            return redirect()->route('direction.dashboard');
        } elseif ($user->isAgence()) {
            return redirect()->route('agence.dashboard');
        }

        // Si aucun type spécifique, rediriger vers la page précédente ou le tableau de bord par défaut
        return redirect()->intended($request->input('previous_url') ?? RouteServiceProvider::HOME);
    }
}
