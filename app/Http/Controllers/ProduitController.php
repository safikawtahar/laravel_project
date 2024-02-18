<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class ProduitController extends Controller
{
        public function getProduit(){
            return response()->json(Produit::all());
        }
        
        public function addProduit(Request $request){
            $prod= Produit::create($request->all());
            return response($prod,201);
        }

        public function updateProduit(Request $request, $id){
            $prod = Produit::find($id);
        
            if (is_null($prod)) {
                return response()->json(['message' => 'Product not found'], 404);
            }
        
            $prod->update($request->all());
        
            // Ajoutez cette ligne pour retourner le produit mis à jour
            return response()->json($prod, 200);
        }
         

        public function deleteProduit(Request $request, $id){
                $prod=Produit::find($id);
                if(is_null($prod)){
                    return response()->json(['message'=>'product not found'],404);
                }
            $prod->delete();
            return response()->json(null,204);
  
        }    
 }

