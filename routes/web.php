<?php

use App\Models\Categorie;
use App\Models\Livre;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.master');
   // $categorie = Categorie::all()->first();	
   //  dd($categorie->livres);
});
Route::resource('livres', 'App\Http\Controllers\LivreController');
Route::resource('categories', 'App\Http\Controllers\CategorieController');
Route::resource('auteurs', 'App\Http\Controllers\AuteurController');


Route::get('livre/{categorie}', ['App\Http\Controllers\CategorieController','livre_categorie'])->name('categories.livre');