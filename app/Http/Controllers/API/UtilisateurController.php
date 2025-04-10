<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utilisateurs = Utilisateur::with('roles.permissions')->get();

        return response()->json([
            'status' => true,
            'message' => 'Liste des utilisateurs récupérée avec succès',
            'data' => $utilisateurs
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pseudo' => 'required|string|max:100',
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'mot_de_passe' => 'required|string|max:255',
            'code_postal' => 'required|string|max:100',
            'ville' => 'required|string|max:100',
            'actif' => 'required|boolean',
        ]);

        $utilisateur = Utilisateur::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Utilisateur ajouté avec succès',
            'data' => $utilisateur
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Utilisateur $utilisateur)
    {
        $utilisateur->load('roles.permissions');

        return response()->json([
            'status' => true,
            'message' => 'Utilisateur trouvé avec succès',
            'data' => $utilisateur
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
        $validated = $request->validate([
            'pseudo' => 'required|string|max:100',
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'mot_de_passe' => 'required|string|max:255',
            'code_postal' => 'required|string|max:100',
            'ville' => 'required|string|max:100',
            'actif' => 'required|boolean',
        ]);

        $utilisateur->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Utilisateur modifié avec succès',
            'data' => $utilisateur
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Utilisateur $utilisateur)
    {
        $utilisateur->delete();

        return response()->json([
            'status' => true,
            'message' => 'Utilisateur supprimé avec succès'
        ], 200);
    }
}
