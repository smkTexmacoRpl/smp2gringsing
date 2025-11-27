<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Kategori;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::with('galeries')->get();
        // return view('front.galeri', compact('kategories'));
        $galeris = Galeri::with('kategori')->orderBy('created_at', 'desc')->get();
        $galeri = \App\Models\Galeri::all()->map(function ($g) {
            return [
                'src' => $g->fotos ? \Illuminate\Support\Facades\Storage::url($g->foto) : null,
                'category' => $g->kategori_id,
            ];
        })->values()->toArray();
        return view('front.galeri', compact('galeri', 'galeris', 'kategoris'));
    }
}
