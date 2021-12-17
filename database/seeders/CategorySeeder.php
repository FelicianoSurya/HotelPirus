<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::create([
            'categoryCode' => 'KATEGORI01',
            'categoryName' => 'Sabun',
            'createdBy' => 1,
            'updatedBy' => 1,
        ]);
        Categories::create([
            'categoryCode' => 'KATEGORI02',
            'categoryName' => 'Bed',
            'createdBy' => 2,
            'updatedBy' => 1,
        ]);
        Categories::create([
            'categoryCode' => 'KATEGORI03',
            'categoryName' => 'Pengharum',
            'createdBy' => 3,
            'updatedBy' => 1,
        ]);
        Categories::create([
            'categoryCode' => 'KATEGORI04',
            'categoryName' => 'Kebersihan',
            'createdBy' => 2,
            'updatedBy' => 2,
        ]);
    }
}
