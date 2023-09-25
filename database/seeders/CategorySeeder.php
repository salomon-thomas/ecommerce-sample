<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Example data
        $data = [
            ['name' => 'Men'],
            ['name' => 'Women'],
            ['name' => 'Boys'],
            ['name' => 'Girls'],
        ];

        // Insert data into the categories table
        foreach ($data as $insert)
            Categories::create($insert);
    }
}
