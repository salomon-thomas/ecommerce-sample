<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Example data
        $data = [
            ['name' => 'Admin'],
            ['name' => 'User'],
        ];

        foreach ($data as $insert)
            Roles::create($insert);
    }
}
