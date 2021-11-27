<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Purchasing;

class PurchasingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Purchasing::create([
            'supplierID' => 1,
            'inventoryID' => 1,
            'qtyPurchased' => 4,
            'price' => 18000,
            'grand' => 72000,
            'orderDate' => '2021-10-30',
            'status' => 'recieved',
            'createdBy' => 1,
            'updatedBy' => 1,
        ]);
        Purchasing::create([
            'supplierID' => 2,
            'inventoryID' => 2,
            'qtyPurchased' => 5,
            'price' => 30000,
            'grand' => 150000,
            'orderDate' => '2021-10-30',
            'status' => 'recieved',
            'createdBy' => 2,
            'updatedBy' => 2,
        ]);
        Purchasing::create([
            'supplierID' => 1,
            'inventoryID' => 1,
            'qtyPurchased' => 4,
            'price' => 18000,
            'grand' => 72000,
            'orderDate' => '2021-10-30',
            'status' => 'paid',
            'createdBy' => 1,
            'updatedBy' => 1,
        ]);
        Purchasing::create([
            'supplierID' => 1,
            'inventoryID' => 1,
            'qtyPurchased' => 4,
            'price' => 18000,
            'grand' => 150000,
            'orderDate' => '2021-10-30',
            'status' => 'cancel',
            'createdBy' => 1,
            'updatedBy' => 1,
        ]);
    }
}
