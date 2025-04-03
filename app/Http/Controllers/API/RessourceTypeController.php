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
        $ressource_type = RessourceType::all();
        return response()->json($ressource_type);
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
    public function show(ressourcetype $ressourcetype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ressourcetype $ressourcetype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ressourcetype $ressourcetype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ressourcetype $ressourcetype)
    {
        //
    }
}
