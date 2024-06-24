<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;


use App\Models\Admin;
use App\Models\Docteur;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function loginform()
    {
        return view('loginform');
    }

    

    public function login(Request $request)
    {
              // Valider les données du formulaire
              $request->validate([
                'pseudo' => 'required|string',
                'password' => 'required|string|min:6',
                'role' => 'required|string|in:patient,docteur,admin',
            ]);
    
            // Récupérer les identifiants et le rôle depuis la requête
            $credentials = $request->only('pseudo', 'password');
            $role = $request->input('role');
    
            // Authentifier l'utilisateur en fonction du rôle spécifié
            switch ($role) {
                case 'patient':
                    $user = Patient::where('pseudo', $credentials['pseudo'])->first();
                    break;
    
                case 'docteur':
                    $user = Docteur::where('pseudo', $credentials['pseudo'])->first();
                    break;
    
                case 'admin':
                    $user = Admin::where('pseudo', $credentials['pseudo'])->first();
                    break;
    
                default:
                    return back()->withErrors(['error' => 'Invalid role specified.']);
            }
    
            // Vérifier si l'utilisateur existe et que le mot de passe correspond
            if ($user && md5($credentials['password']) === $user->password) {
             
    
                // Rediriger l'utilisateur vers le tableau de bord approprié
                switch ($role) {
                    case 'patient':
                        return redirect()->intended('/patient/dashboard');
                    case 'docteur':
                        return redirect()->intended('/docteur/dashboard');
                    case 'admin':
                        return redirect()->intended('/admin/dashboard');
                }
            }
    
            // Si les identifiants ne correspondent pas, renvoyer avec une erreur
            return back()->withErrors(['error' => 'The provided credentials do not match our records.']);
        }
    
}


