<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompteController;
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//table produit 
Route::get('produit/get', [ProduitController::class, 'getProduit']);
Route::post('produit/post', [ProduitController::class, 'addProduit']);
Route::put('produit/update/{id}', [ProduitController::class, 'updateProduit']);
Route::delete('produit/delete/{id}', [ProduitController::class, 'deleteProduit']);

//table client
Route::post('client/register', [ClientController::class, 'register']);

//table compte
Route::post('compte/login', [CompteController::class, 'connexion']);











