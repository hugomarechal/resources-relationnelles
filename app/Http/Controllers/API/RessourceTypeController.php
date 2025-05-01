<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\RessourceType;
use Illuminate\Http\Request;

class RessourceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ressourcetypes = RessourceType::orderBy('lib_ressource_type')->get();

        return response()->json([
            'status' => true,
            'message' => 'Liste des types de ressource récupérée avec succès',
            'data' => $ressourcetypes
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'lib_ressource_type' => 'required|string|max:100',
            'visible' => 'required|boolean',
        ]);

        $ressourcetype = RessourceType::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Type de ressource ajouté avec succès',
            'data' => $ressourcetype
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ressourcetype $ressourcetype)
    {
        return response()->json([
            'status' => true,
            'message' => 'Type de ressource trouvé avec succès',
            'data' => $ressourcetype
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ressourcetype $ressourcetype)
    {
        $validated = $request->validate([
            'lib_ressource_type' => 'required|string|max:100',
            'visible' => 'required|boolean',
        ]);

        $ressourcetype->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Type de ressource modifié avec succès',
            'data' => $ressourcetype
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ressourcetype $ressourcetype)
    {
        $ressourcetype->delete();

        return response()->json([
            'status' => true,
            'message' => 'Type de ressource supprimé avec succès'
        ], 200);
    }
}
