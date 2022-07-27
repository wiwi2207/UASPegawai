<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawais';
    protected $fillable = ['nip', 'nama', 'tgl_lahir', 'jk', 'telepon'];

    public function jabatan()
    {
        return $this->belongsTo(jabatan::class, 'jabatan_id');
    }

    public function riwayatpendidikan()
    {
        return $this->belongsTo(riwayatpendidikan::class, 'riwayatpendidikan_id');
    }
}
