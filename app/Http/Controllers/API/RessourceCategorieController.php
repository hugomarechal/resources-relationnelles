<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\RessourceCategorie;
use Illuminate\Http\Request;

class RessourceCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ressource_categorie = RessourceCategorie::all();
        return response()->json($ressource_categorie);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ressourcecategorie $ressourcecategorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ressourcecategorie $ressourcecategorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ressourcecategorie $ressourcecategorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ressourcecategorie $ressourcecategorie)
    {
        //
    }
}
