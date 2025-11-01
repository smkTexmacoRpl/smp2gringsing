<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeris';
    protected $fillable = ['kategori_id', 'fotos', 'judul', 'deskripsi'];
    protected $casts = [
        'fotos' => 'array',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($galeri) {
            // Hapus file gambar dari storage
            if ($galeri->fotos && file_exists(public_path('galeri/' . $galeri->fotos[0]))) {
                unlink(public_path('galeri/' . $galeri->fotos[0]));
            }
        });
    }
}
