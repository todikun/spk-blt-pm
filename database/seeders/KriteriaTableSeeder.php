<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Seeder;

class KriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kriteria = [
            [
                'aspekid' => 1,
                'nama' => 'Tidak Menerima PKH',
                'nilai_ideal' => 4,
                'prioritas' => 60,
            ],
            [
                'aspekid' => 1,
                'nama' => 'Bukan Termasuk Penerima BPNT',
                'nilai_ideal' => 4,
                'prioritas' => 40,
            ],
            [
                'aspekid' => 2,
                'nama' => 'Penghasilan Keluarga',
                'nilai_ideal' => 5,
                'prioritas' => 60,
            ],
            [
                'aspekid' => 2,
                'nama' => 'Anggota Keluarga',
                'nilai_ideal' => 5,
                'prioritas' => 60,
            ],
            [
                'aspekid' => 2,
                'nama' => 'Keluarga Miskin yang sudah terdata/belum dalam DTKS',
                'nilai_ideal' => 4,
                'prioritas' => 40,
            ],
        ];

        Kriteria::insert($kriteria);
    }
}
