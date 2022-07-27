<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        jabatan::create(
            [
            'jabatan' => 'kepala hrd',
            'bagian' => 'hrd',
            ],
             );
    }
}
