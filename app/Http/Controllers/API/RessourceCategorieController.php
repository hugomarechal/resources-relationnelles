<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\RessourceCategorie;
use Illuminate\Http\Request;

class ressourceCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ressourcecategories = RessourceCategorie::all();

        return response()->json([
            'status' => true,
            'message' => 'Liste des catégories de ressource récupérée avec succès',
            'data' => $ressourcecategories
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'lib_ressource_categorie' => 'required|string|max:100',
            'visible' => 'required|boolean',
        ]);

        $ressourceCategorie = RessourceCategorie::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Catégorie de ressource ajoutée avec succès',
            'data' => $ressourceCategorie
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(RessourceCategorie $ressourcecategorie)
    {
        return response()->json([
            'status' => true,
            'message' => 'Catégorie de ressource trouvée avec succès',
            'data' => $ressourcecategorie
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RessourceCategorie $ressourcecategorie)
    {
        $validated = $request->validate([
            'lib_ressource_categorie' => 'required|string|max:100',
            'visible' => 'required|boolean',
        ]);

        $ressourcecategorie->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Catégorie de ressource modifiée avec succès',
            'data' => $ressourcecategorie
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RessourceCategorie $ressourcecategorie)
    {
        $ressourcecategorie->delete();

        return response()->json([
            'status' => true,
            'message' => 'Catégorie de ressource supprimée avec succès'
        ], 200);
    }
}
