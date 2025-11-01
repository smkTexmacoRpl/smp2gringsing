<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfilSekolah extends Model
{
    use HasFactory;
    protected $table = 'profil_sekolahs';
    protected $fillable = [
        'nama_sekolah',
        'alamat',
        'telepon',
        'email',
        'visi',
        'misi',
        'logo_sekolah',
    ];
}
