<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;


use Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    

    public function login_store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'role' => 'required|string'
        ]);

        $credentials = $request->only('email', 'password');
        $role = $request->input('role');
      
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
           
            if ($user->role !== $role) {
                Auth::logout();
                return back()->withErrors([
                    'error' => 'Le rôle spécifié ne correspond pas à votre compte.',
                ]);
            }

            switch ($user->role) {
                case 'patient':
                    return redirect()->intended('patient/dashboard');
                case 'docteur':
                    return redirect()->intended('docteur/dashboard');
                case 'admin':
                    return redirect()->intended('admin/dashboard');
                default:
                    Auth::logout();
                    return redirect()->route('login_form')->withErrors(['error' => 'Rôle non reconnu.']);
            }
        }

        return back()->withErrors([
            'error' => 'Ces identifiants ne correspondent pas à nos enregistrements.',
        ]);
    
    }

    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'photo' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'datenaiss' => 'required|date',
            'telephone' => 'required|string|max:15',
            'password' => 'required|string|min:8',
            'taille' => 'nullable|string|max:10',
            'poid' => 'nullable|numeric',
            'role' => 'required|string|max:255'
        ]);

       

        // Créer un nouvel utilisateur
        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'photo' => $request->photo,
            'email' => $request->email,
            'datenaiss' => $request->datenaiss,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
            'taille' => $request->taille,
            'poid' => $request->poid,
            'role' => $request->role
        ]);
     
        // Rediriger l'utilisateur avec un message de succès
        return redirect()->route('login_form')->with('success', 'Compte créé avec succès. Vous pouvez maintenant vous connecter.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login_form');
    }
    
}


