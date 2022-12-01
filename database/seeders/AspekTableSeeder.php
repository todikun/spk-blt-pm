<?php

namespace Database\Seeders;

use App\Models\Aspek;
use Illuminate\Database\Seeder;

class AspekTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aspek = [
            [
                'kode' => 'BT',
                'nama' => 'Bantuan'
            ],
            [
                'kode' => 'PF',
                'nama' => 'Profil'
            ],
        ];

        Aspek::insert($aspek);
    }
}
