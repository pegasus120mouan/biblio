<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use Illuminate\Http\Request;

class AuteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      // $auteurs = Auteur::all();
       $auteurs = Auteur::query();

        $request->whenFilled('nom', function($nom) use($auteurs) {
            $auteurs = $auteurs->where('nom', 'like', '%'.$nom.'%');
        });
        $auteurs = $auteurs->get();
       // return view('livres.index',compact('livres'));

        return view('auteurs.index',compact('auteurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auteurs.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
            'nom' => 'required',
        ]);

        $auteur = new Auteur([
            'nom' => $request->input('nom'),
        ]);

        $auteur->save();
        return redirect('/auteurs')->with('success','Insertion effectuée avec Succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auteur  $auteur
     * @return \Illuminate\Http\Response
     */
    public function show(Auteur $auteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auteur  $auteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Auteur $auteur)
    {
        return view('auteurs.edit',compact('auteur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auteur  $auteur
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
         $request->validate([
            'nom' => 'required',
        ]);

        $auteur = Auteur::find($id);
        $auteur->nom = $request->input('nom');

        $auteur->update();
        return redirect('/auteurs')->with('success','Modification effectuée avec Succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auteur  $auteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auteur $auteur)
    {
         $auteur->delete();
        return redirect('/auteurs')->with('success','Suppression effectuée avec Success!');
    }
}