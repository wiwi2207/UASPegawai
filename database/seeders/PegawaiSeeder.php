<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        pegawai::create(
            [
            'nip' => '27438',
            'nama' => 'wiwin',
            'tgl_lahir' => '10 januari 1990',
            'jk' => 'perempuan',
            'telepon' => '438484'
            ],
             );
    }
}
