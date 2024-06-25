<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patientcreate');
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
            'datenaiss' => 'required|date',
            'telephone' => 'required|string|max:20',
            'pseudo' => 'required|string|unique:patients',
            'password' => 'required|string|min:6',
            'taille' => 'required|string',
            'email' => 'required|email',
            'poid' => 'required',
           
        ]);

        // Créer un nouveau patient avec les données validées
        $patient = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'datenaiss' => $request->datenaiss,
            'telephone' => $request->telephone,
            'pseudo' => $request->pseudo,
            'password' => md5($request->password), // Utilisation de MD5, à des fins d'exemple uniquement
            'taille' => $request->taille,
            
            'poid' => $request->poid,
          
        ]);

        // Redirection avec un message de succès
        return redirect()->route('patientcreate')->with('success', 'Patient ajouté avec succès.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
