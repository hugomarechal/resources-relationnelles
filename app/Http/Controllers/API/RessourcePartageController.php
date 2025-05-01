<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\RessourcePartage;
use Illuminate\Http\Request;

class RessourcePartageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ressource_id' => 'required|exists:ressources,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $partage = RessourcePartage::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Partage de ressouce ajoutée avec succès',
            'data' => $partage
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(RessourcePartage $ressourcePartage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RessourcePartage $ressourcePartage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RessourcePartage $ressourcePartage)
    {
        //
    }
}
