<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::with('kategori')->get();
        $galeri = \App\Models\Galeri::all()->map(function ($g) {
            return [
                'src' => $g->fotos ? \Illuminate\Support\Facades\Storage::url($g->foto) : null,
                'category' => $g->kategori_id,
            ];
        })->values()->toArray();
        return view('front.galeri', compact('galeri', 'galeris'));
    }
}

