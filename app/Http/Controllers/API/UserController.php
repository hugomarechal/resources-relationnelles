<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return response()->json([
            'status' => true,
            'message' => 'Liste des utilisateurs récupérée avec succès',
            'data' => $users
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validation des données ------------------------

        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'password' => 'required|string|max:255',
            'pseudo' => 'nullable|string|max:100',
            'code_postal' => 'nullable|string|max:100',
            'ville' => 'nullable|string|max:100',
            'actif' => 'required|boolean',

            'role_id' => 'nullable|integer|exists:roles,id'
        ]);
         
         // Déterminer le rôle demandé ou définir 'citizen' par défaut-----------------
         $roleId = $validated['role_id'] ?? 4; // 4 est l'ID par défaut pour 'Citoyens'

        // Si le rôle n'est pas 'Citoyens', vérifier que l'utilisateur connecté est superadmin
    
        if ($roleId !== 4) {
            if (!Auth::check() || Auth::user()->role_id !== 1) {
                return response()->json([
                    'status' => false,
                    'message' => 'Seul un superadmin peut attribuer ce rôle.'
                ], 403);
            }
        }
        // Force l'assignation du rôle de l'utilisateur avant la création
        $validated['role_id'] = $roleId;

        // Créer l'utilisateur ------------------------
        $utilisateur = Utilisateur::create($validated);
    

        return response()->json([
            'status' => true,
            'message' => 'Utilisateur ajouté avec succès',
            'data' => $user
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json([
            'status' => true,
            'message' => 'Utilisateur trouvé avec succès',
            'data' => $user
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
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

        $user->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Utilisateur modifié avec succès',
            'data' => $user
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'status' => true,
            'message' => 'Utilisateur supprimé avec succès'
        ], 200);
    }
}
