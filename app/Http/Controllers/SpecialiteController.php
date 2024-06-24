<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialite = Specialite::orderBy('created_at','desc')->paginate('3');
        return view('admin/indexspecialite',compact('specialite'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/formcreatespecialite');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomspecialite' => 'required|string|max:255',
            'photo' => 'nullable|string|max:255',
        ]);

            // Vérifier si la spécialité existe déjà
        $existingSpecialite = Specialite::where('nomspecialite', $request->nomspecialite)->first();

        if ($existingSpecialite) {
            return back()->withErrors(['nomspecialite' => 'Cette spécialité existe déjà.']);
        }

        // Créer une nouvelle spécialité
        $specialite = new Specialite();
        $specialite->nomspecialite = $request->nomspecialite;
        $specialite->photo = $request->photo;
        $specialite->save();

        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Spécialité ajoutée avec succès!');
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
        $specialite = Specialite::find($id);
        return view('admin/editerspecialite',compact('specialite'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nomspecialite' => 'required|string|max:255',
            'photo' => 'nullable|string|max:255',
        ]);

        // mise a jour
        $specialite = Specialite::findOrFail($id);
        $specialite->nomspecialite = $request->nomspecialite;
        $specialite->photo = $request->photo;
        $specialite->save();

        // Redirection avec un message de succès
        return redirect()->route('indexspecialite')->with('success', 'Spécialité mise a jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $specialite = Specialite::findOrFail($id);
        $specialite->delete();
        return back()->with('success','element supprimer avec success');
    }
}
