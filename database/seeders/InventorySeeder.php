<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inventory;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inventory::create([
            'inventoryCode' => 'SABUN01',
            'inventoryName' => 'Body Wash Vitals 200ml - Fresh Dazzle',
            'stock' => 40,
            'createdBy' => 1,
            'updatedBy' => 1,
        ]);
        Inventory::create([
            'inventoryCode' => 'SARUNG01',
            'inventoryName' => 'Sarung Bantal',
            'stock' => 40,
            'createdBy' => 2,
            'updatedBy' => 1,
        ]);
        Inventory::create([
            'inventoryCode' => 'PARFUM01',
            'inventoryName' => 'Pengharum Semprot Stella 250ml - Orange',
            'stock' => 15,
            'createdBy' => 3,
            'updatedBy' => 1,
        ]);
        Inventory::create([
            'inventoryCode' => 'PEL01',
            'inventoryName' => 'Pel Lantai',
            'stock' => 10,
            'createdBy' => 2,
            'updatedBy' => 2,
        ]);
        Inventory::create([
            'inventoryCode' => 'PARFUM02',
            'inventoryName' => 'Pengharum Matic Stella',
            'stock' => 10,
            'createdBy' => 3,
            'updatedBy' => 3,
        ]);
    }
}
