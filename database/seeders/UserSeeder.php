<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::pluck('id', 'name');

        $users = [
            ['nom' => 'Durand', 'prenom' => 'Alice', 'email' => 'alice@admin.fr', 'role' => 'super-administrateur', 'code_postal' => '75001', 'ville' => 'Paris'],
            ['nom' => 'Martin', 'prenom' => 'Jean', 'email' => 'jean@moderateur.fr', 'role' => 'modérateur', 'code_postal' => '69003', 'ville' => 'Lyon'],
            ['nom' => 'Dupont', 'prenom' => 'Emma', 'email' => 'emma@citoyen.fr', 'role' => 'citoyen', 'code_postal' => '13001', 'ville' => 'Marseille'],
            ['nom' => 'Bernard', 'prenom' => 'Lucie', 'email' => 'lucie@citoyen.fr', 'role' => 'citoyen', 'code_postal' => '31000', 'ville' => 'Toulouse'],
            ['nom' => 'Noel', 'prenom' => 'Samuel', 'email' => 'samuel@admin.fr', 'role' => 'administrateur', 'code_postal' => '44000', 'ville' => 'Nantes'],
            ['nom' => 'Petit', 'prenom' => 'Clara', 'email' => 'clara@citoyen.fr', 'role' => 'citoyen', 'code_postal' => '35000', 'ville' => 'Rennes'],
            ['nom' => 'Lemoine', 'prenom' => 'David', 'email' => 'david@citoyen.fr', 'role' => 'citoyen', 'code_postal' => '67000', 'ville' => 'Strasbourg'],
            ['nom' => 'Benoit', 'prenom' => 'Sarah', 'email' => 'sarah@citoyen.fr', 'role' => 'citoyen', 'code_postal' => '21000', 'ville' => 'Dijon'],
            ['nom' => 'Robert', 'prenom' => 'Thomas', 'email' => 'thomas@citoyen.fr', 'role' => 'citoyen', 'code_postal' => '59000', 'ville' => 'Lille'],
            ['nom' => 'Colin', 'prenom' => 'Isabelle', 'email' => 'isabelle@admin.fr', 'role' => 'administrateur', 'code_postal' => '38000', 'ville' => 'Grenoble'],
        ];

        foreach ($users as $data) {
            User::create([
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'email' => $data['email'],
                'email_verified_at' => now(),
                'password' => 'password',
                'pseudo' => Str::slug($data['prenom']) . rand(10, 99),
                'code_postal' => $data['code_postal'],
                'ville' => $data['ville'],
                'actif' => true,
                'role_id' => $roles[$data['role']],
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
