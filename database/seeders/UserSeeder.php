<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
                'name' => 'Andi',
                'username' => 'andi',
                'password' => bcrypt('andi')
        ]);
        User::create([
            'name' => 'Doni',
            'username' => 'doni',
            'password' => bcrypt('doni')
        ]);
        User::create([
            'name' => 'Kevin',
            'username' => 'kevin',
            'password' => bcrypt('kevin')
        ]);
    }
}
