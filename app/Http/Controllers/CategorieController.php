<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index',compact('categories'));
    }
    
    public function livre_categorie(Categorie $categorie)
    {
        return view('categories.livre',compact('categorie'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.add');
        
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

        $categorie = new Categorie([
            'nom' => $request->input('nom'),
        ]);

        

        $categorie->save();
        return redirect('/categories')->with('success','Insertion effectuée avec Succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
   public function edit(Categorie $categorie)
    {
               return view('categories.edit',compact('categorie'));

    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response    
     */     
    public function update(Request $request, Categorie $categorie)
    {
         $request->validate([
            'nom' => 'required',
        ]);

        $categorie->nom = $request->input('nom');

        $categorie->update();
        return redirect('/categories')->with('success','Modification effectuée avec Succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return redirect('/categories')->with('success','Suppression effectuée avec Success!');
    }
}