<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil_Sekolah extends Model
{
    protected $table = 'profil_sekolahs';
    protected $fillable = ['nama_sekolah', 'alamat', 'telepon', 'email', 'visi', 'misi', 'sejarah'];
}
