<?php

namespace Database\Seeders;

use App\Models\Kondisi;
use Illuminate\Database\Seeder;

class KondisiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kondisi = [
            [
                'kriteriaid' => 1,
                'nama' => 'Ya',
                'nilai' => 4,
            ],
            [
                'kriteriaid' => 1,
                'nama' => 'Tidak',
                'nilai' => 1,
            ],
            [
                'kriteriaid' => 2,
                'nama' => 'Ya',
                'nilai' => 4,
            ],
            [
                'kriteriaid' => 2,
                'nama' => 'Tidak',
                'nilai' => 1,
            ],
            [
                'kriteriaid' => 3,
                'nama' => '<=1.500.000',
                'nilai' => 5,
            ],
            [
                'kriteriaid' => 3,
                'nama' => '1.500.000-3.000.000',
                'nilai' => 3,
            ],
            [
                'kriteriaid' => 3,
                'nama' => '>=3.000.000',
                'nilai' => 1,
            ],
            [
                'kriteriaid' => 4,
                'nama' => '>=5',
                'nilai' => 5,
            ],
            [
                'kriteriaid' => 4,
                'nama' => '3-4',
                'nilai' => 3,
            ],
            [
                'kriteriaid' => 4,
                'nama' => '<=2',
                'nilai' => 1,
            ],
            [
                'kriteriaid' => 5,
                'nama' => 'Ya',
                'nilai' => 4,
            ],
            [
                'kriteriaid' => 5,
                'nama' => 'Tidak',
                'nilai' => 1,
            ],
        ];
        Kondisi::insert($kondisi);
    }
}
