<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('password'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
