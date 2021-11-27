<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::create([
            'supplierCode' => 'SUP01',
            'supplierName' => 'Toko ABCDE',
            'address' => 'Jalan Cendrawasih No.10',
            'phoneNumber' => 628167487,
            'createdBy' => 1,
            'updatedBy' => 2 
        ]);
        Supplier::create([
            'supplierCode' => 'SUP02',
            'supplierName' => 'Toko Barang Rumah',
            'address' => 'Jalan Elang No.3',
            'phoneNumber' => 637838772,
            'createdBy' => 2,
            'updatedBy' => 3 
        ]);
        Supplier::create([
            'supplierCode' => 'SUP03',
            'supplierName' => 'Toko Parfum',
            'address' => 'Jalan Jakarta No.3',
            'phoneNumber' => 6263748844,
            'createdBy' => 3,
            'updatedBy' => 3 
        ]);
        
        Supplier::create([
            'supplierCode' => 'SUP04',
            'supplierName' => 'Toko Minuman',
            'address' => 'Jalan Sudirman No.5',
            'phoneNumber' => 6278859596,
            'createdBy' => 1,
            'updatedBy' => 1 
        ]);
    }
}
