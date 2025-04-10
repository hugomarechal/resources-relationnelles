<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\RelationType;
use Illuminate\Http\Request;

class RelationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $relation_types = RelationType::all();

        return response()->json([
            'status' => true,
            'message' => 'Liste des types de relation récupérée avec succès',
            'data' => $relation_types
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'lib_relation_type' => 'required|string|max:100',
            'visible' => 'required|boolean',
        ]);

        $relationType = RelationType::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Type de relation ajoutée avec succès',
            'data' => $relationType
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(relationtype $relationtype)
    {
        return response()->json([
            'status' => true,
            'message' => 'Type de relation trouvée avec succès',
            'data' => $relationtype
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, relationtype $relationtype)
    {
        $validated = $request->validate([
            'lib_relation_type' => 'required|string|max:100',
            'visible' => 'required|boolean',
        ]);

        $relationtype->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Type de relation modifiée avec succès',
            'data' => $relationtype
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(relationtype $relationtype)
    {
        $relationtype->delete();

        return response()->json([
            'status' => true,
            'message' => 'Type de relation supprimée avec succès'
        ], 200);
    }
}
