<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = [
            ['name' => 'Admin'],
            ['name' => 'Guru'],
            ['name' => 'Murid'],
        ];

        foreach ($role as $item) {
            Role::create($item);
        }
    }
}
