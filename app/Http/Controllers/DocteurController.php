<?php

namespace App\Http\Controllers;

use App\Models\Docteur;
use App\Models\Specialite;
use Illuminate\Http\Request;

class DocteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docteur = Docteur::with('specialite')->orderBy('created_at', 'desc')->paginate(3);
        return view('admin/indexdocteur', compact('docteur'));
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
        $request->validate([
            'pseudo' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'telephone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:docteurs',
            'photo' => 'nullable|string|max:255',
            'idspecialite' => 'required|exists:specialites,id',
        ]);

        Docteur::create([
            'pseudo' => $request->pseudo,
            'password' => md5($request->password),
            'telephone' => $request->telephone,
            'email' => $request->email,
            'photo' => $request->photo,
            'idspecialite' => $request->idspecialite,
        ]);

        return redirect()->back()->with('success', 'Docteur créé avec succès.');
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
        $docteur = Docteur::findOrFail($id);
        $specialite = Specialite::all();
        return view('admin/docteur_edit', compact('docteur', 'specialite'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pseudo' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
            'telephone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:docteurs,email,' . $id,
            'photo' => 'nullable|string|max:255',
            'idspecialite' => 'required|exists:specialites,id',
        ]);

        $docteur = Docteur::findOrFail($id);
        $docteur->pseudo = $request->pseudo;
        $docteur->telephone = $request->telephone;
        $docteur->email = $request->email;
        $docteur->photo = $request->photo;
        $docteur->idspecialite = $request->idspecialite;
        $docteur->save();

        return redirect()->route('docteur_index')->with('success', 'Docteur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $docteur = Docteur::findOrFail($id);
        $docteur->delete();

        return redirect()->route('docteur_index')->with('success', 'Docteur supprimé avec succès.');
    }
}
