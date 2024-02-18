<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTExceptions;
use Illuminate\Support\Facades\Auth; // Importer la façade Auth ici
use App\Models\Compte; // Assurez-vous d'importer le modèle Compte correctement
use App\Models\Client;

class CompteController extends Controller
{
    // Méthode pour la connexion
    public function connexion(Request $request){
    $credentials = $request->only('email', 'password'); // Modifier ici 'login' en 'email

    // Vérifier si le client existe et récupérer le compte associé
    $client = Client::where('email', $request->email)->first();
    if ($client) {
        $compte = Compte::find($client->id_compte);

        // Vérifier si le compte existe et si son ID correspond à celui du client
        if ($compte && $compte->id_compte === $client->id_compte) {
            // Continuer avec l'authentification
            try {
                if (!$token = Compte::attempt($credentials)) {
                    // Authentification échouée en raison d'identifiants incorrects
                    return response()->json(['error' => 'Login or password incorrect'], 401);
                }
            } catch(\Exception $e) {
                // Erreur lors de la tentative d'authentification
                return response()->json(['error' => 'Could not authenticate'], 500);
            }

            // Authentification réussie, retourner le token
            return response()->json(['token' => $token], 200);
        } else {
            // Les identifiants ne correspondent pas, l'authentification échouera
            return response()->json(['error' => 'Compte mismatch'], 401);
        }
    } else {
        // Le client n'existe pas, l'authentification échouera
        return response()->json(['error' => 'Client not found'], 404);
    }
}
}




