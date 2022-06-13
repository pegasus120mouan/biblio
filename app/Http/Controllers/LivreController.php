<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\AuteurLivre;
use App\Models\Categorie;
use App\Models\Livre;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
       
       // $livres = Livre::all();
        $livres = Livre::query();

        $request->whenFilled('title', function($title) use($livres) {
            $livres = $livres->where('titre', 'like', '%'.$title.'%');
        });

        $livres = $livres->get();
        return view('livres.index',compact('livres'));


       // $livres = Livre::all();
       // return view("chauffeurs.index", compact('chauffeurs','chauffeurs'));
       // return view('livres.index', compact('livres','livres'));
      //dd( $livres);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories = Categorie::all();
       $auteurs=Auteur::all();
      return view('livres.add',['categories'=>$categories],['auteurs'=>$auteurs]);
       // dd($auteurs);
      // return view('livres.add');
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
            'titre' => 'required',
            'pages' => 'required',
        ]);

        $livre = new Livre([
            'titre' => $request->input('titre'),
            'pages' => $request->input('pages'),
            'categorie_id' => $request->input('categorie_id'),
        ]);
        
        $livre->save();
        $auteur = Auteur::find($request->input('auteur_id'));
        $livre->auteurs()->save($auteur);
        return redirect('/livres')->with('success','Insertion effectuée avec Succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livre  $livre
     * @return \Illuminate\Http\Response
     */
    public function show(Livre $livre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Livre  $livre
     * @return \Illuminate\Http\Response
     */
    public function edit(Livre $livre)
    {
        return view('livres.edit',compact('livre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Livre  $livre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $request->validate([
            'titre' => 'required',
            'pages' => 'required',
            'resume' => 'required',
        ]);

        $livre = Livre::find($id);
        $livre->titre = $request->input('titre');
        $livre->pages = $request->input('pages');
        $livre->resume = $request->input('resume');;

        $livre->update();
        return redirect('/livres')->with('success','Modification effectuée avec Succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livre  $livre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livre $livre)
    {
        $livre->delete();
        return redirect('/livres')->with('success','Suppression effectuée avec Success!');
    }
}