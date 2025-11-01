<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrakataKepsek extends Model
{
    protected $table = 'prakatas';
    protected $fillable = ['judul', 'isi', 'kepsek', 'foto_kepsek'];
}
