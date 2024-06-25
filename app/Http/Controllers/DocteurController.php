<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Docteur;
use App\Models\Specialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DocteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docteur = User::where('role', 'docteur') // Filtre pour les utilisateurs ayant le rôle 'admin'
        ->with('specialite')   // Charger la relation 'specialite'
        ->orderBy('created_at', 'desc')
        ->paginate(3);

return view('admin.docteur_index', compact('docteur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specialite = Specialite::all();
        return view('admin/docteur_create',compact('specialite'));
    }

    /**
     * Store a newly created resource in storage.
     */
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
            'role' => 'required|string|max:255',
            'idspecialite' => 'required|string|max:255'
        ]);

       

        // Créer un nouvel utilisateur
        $docteur = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'photo' => $request->photo,
            'email' => $request->email,
            'datenaiss' => $request->datenaiss,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
            'taille' => $request->taille,
            'poid' => $request->poid,
            'role' => $request->role,
            'idspecialite' => $request->idspecialite
        ]);
     
        // Rediriger l'utilisateur avec un message de succès
        return redirect()->route('docteur_index')->with('success', 'docteur créé avec succès. Vous pouvez maintenant vous connecter.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $docteur = User::findOrFail($id);
        $specialite = Specialite::all();
        return view('admin/docteur_edit', compact('docteur', 'specialite'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Valider les données du formulaire
         $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'photo' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|',
            'datenaiss' => 'required|date',
            'telephone' => 'required|string|max:15',
            'taille' => 'nullable|string|max:10',
            'poid' => 'nullable|numeric',
            'role' => 'required|string|max:255',
            'idspecialite' => 'required|string|max:255'
        ]);

       
        $docteur = User::findOrFail($id);
        // Créer un nouvel utilisateur
        $docteur->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'photo' => $request->photo,
            'email' => $request->email,
            'datenaiss' => $request->datenaiss,
            'telephone' => $request->telephone,
            'taille' => $request->taille,
            'poid' => $request->poid,
            'role' => $request->role,
            'idspecialite' => $request->idspecialite,
        ]);
     
        // Rediriger l'utilisateur avec un message de succès
        return redirect()->route('docteur_index')->with('success', 'docteur mise a jour avec succès. il peut maintenant vous connecter.');
        
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $docteur = User::findOrFail($id);
        $docteur->delete();

        return redirect()->route('docteur_index')->with('success', 'Docteur supprimé avec succès.');
    }


    public function login()
    {
        return view('docteur/docteur_connexion');
    }

    public function loginstore(Request $request)
    {
        $request->validate([
            'pseudo' => 'required|string',
            'password' => 'required|string',
        ]);

        $docteur = Docteur::where('pseudo', $request->pseudo)->first();

        if ($docteur && md5($request->password, $docteur->password)) {
            Auth::login($docteur);
            return redirect()->intended('docteur/interface_docteur');
        }

        return back()->withErrors([
            'error' => 'Ces identifiants ne correspondent pas à nos enregistrements ou vous n\'êtes pas un docteur.',
        ]);
    }

    public function interface_docteur()
    {
        if(Auth::check()){
            return view('docteur/interface_docteur');
        }
    }
}
