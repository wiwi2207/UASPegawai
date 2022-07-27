<?php

namespace Database\Seeders;

use App\Models\RiwayatPendidikan;
use Illuminate\Database\Seeder;

class RiwayatPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        riwayatpendidikan::create(
            [
            'jenjang' => 'S1',
            'jurusan' => 'Ilmu Komputer',
            'tahun' => '2016',
            ],
             );
    }
}
