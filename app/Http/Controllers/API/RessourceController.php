<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ressource;
use Illuminate\Http\Request;

class RessourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ressources = Ressource::with(['utilisateur', 'ressource_type', 'ressource_categorie', 'relation_type'])->get();

        return response()->json([
            'status' => true,
            'message' => 'Liste des ressources récupérée avec succès',
            'data' => $ressources
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:100',
            'description' => 'required|string|max:500',
            'nom_fichier' => 'required|string|max:255',
            'restreint' => 'required|boolean',
            'url' => 'required|string|max:255',
            'valide' => 'required|boolean',
            'utilisateur_id' => 'required|exists:utilisateurs,id',
            'ressource_categorie_id' => 'required|exists:ressource_categories,id',
            'ressource_type_id' => 'required|exists:ressource_types,id',
            'relation_type_id' => 'required|exists:relation_types,id',
        ]);

        $ressource = Ressource::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Ressource ajoutée avec succès',
            'data' => $ressource
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ressource $ressource)
    {
        $ressource->load(['utilisateur', 'ressource_type', 'ressource_categorie', 'relation_type']);

        return response()->json([
            'status' => true,
            'message' => 'Ressource trouvée avec succès',
            'data' => $ressource
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ressource $ressource)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:100',
            'description' => 'required|string|max:500',
            'nom_fichier' => 'required|string|max:255',
            'restreint' => 'required|boolean',
            'url' => 'required|string|max:255',
            'valide' => 'required|boolean',
            'utilisateur_id' => 'required|exists:utilisateurs,id',
            'ressource_categorie_id' => 'required|exists:ressource_categories,id',
            'ressource_type_id' => 'required|exists:ressource_types,id',
            'relation_type_id' => 'required|exists:relation_types,id',
        ]);

        $ressource->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Ressource modifiée avec succès',
            'data' => $ressource
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ressource $ressource)
    {
        $ressource->delete();

        return response()->json([
            'status' => true,
            'message' => 'Ressource supprimée avec succès'
        ], 200);
    }
}
