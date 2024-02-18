<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Compte;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;

//cette méthode sert à enregistrer un nouveau client associé à un compte existant
// en vérifiant d'abord l'existence du compte et ensuite en vérifiant si un client avec le même email existe déjà
class ClientController extends Controller
{
    public function register(Request $request){
        // Vérifiez d'abord si un compte existe avec l'email fourni
        $compte = Compte::where('email', $request->email)->first();

        if (!$compte) {
            // Si le compte n'existe pas, vous pouvez choisir de créer un nouveau compte ici
            // Ou renvoyer une réponse d'erreur indiquant que le compte n'existe pas
            return response()->json(['error' => 'Compte not found'], 404);
        }

        // Vérifiez si un client existe déjà avec l'email fourni
        $existingClient = Client::where('email', $request->email)->first();

        if ($existingClient) {
            // Si un client avec cet email existe déjà, retournez une réponse d'erreur
            return response()->json([
                'status' => 0,
                'message' => 'Email already exists',
                'code' => 409
            ]);
        }

        // Cryptez le mot de passe avant de l'insérer dans la base de données
        $password = Hash::make($request->input('password'));

        // Créez un nouveau client avec les données fournies dans la requête
        $client = Client::create([
            'nom_client' => $request->nom_client,
            'num_tel' => $request->num_tel,
            'email' => $request->email,
            'id_compte' => $compte->id_compte, // Assurez-vous d'ajouter cette ligne
            'password' => $password, // Enregistrez le mot de passe crypté
        ]);

        // Retournez une réponse de succès
        return response()->json([
            'status' => 1,
            'message' => 'Client registered successfully',
            'code' => 200
        ]);
    }
}