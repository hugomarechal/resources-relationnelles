<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'super-administrateur'],
            ['name' => 'administrateur'],
            ['name' => 'modérateur'],
            ['name' => 'citoyen connecté']
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
