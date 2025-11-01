<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Kategori;
use App\Models\Prakata;
use App\Models\Tag;

class SiteController extends Controller
{
    // public function home()
    // {
    //     $hero = [
    //         'title' => 'SMA Negeri Contoh',
    //         'subtitle' => 'Blog resmi kegiatan & informasi sekolah',
    //         'bg' => asset('assets/images/smp21.webp')
    //     ];
    //     $about = 'SMA Negeri Contoh adalah ... (tuliskan profil singkat sekolah)';
    //     $visi = 'Menjadi sekolah unggul dalam ...';
    //     $misi = [
    //         'Meningkatkan mutu pendidikan',
    //         'Mengembangkan karakter siswa',
    //         'Memfasilitasi kegiatan ekstrakurikuler'
    //     ];

    //     $latest = Post::with('kategori', 'tags')->where('is_published', true)->latest('published_at')->take(6)->get();

    //     // return view('site.home', compact('hero', 'about', 'visi', 'misi', 'latest'));
    //     return view('components.halaman_depan.kursus', compact('hero', 'about', 'visi', 'misi', 'latest'));
    // }

    public function show($slug)
    {
        $post = Post::with('kategori', 'tags', 'author')->where('slug', $slug)->where('is_published', true)->firstOrFail();
        $related = Post::where('kategori_id', $post->kategori_id)->where('id', '!=', $post->id)->take(4)->get();
        return view('front.detailBerita', compact('post', 'related'));
    }

    public function category($slug)
    {
        $category = Kategori::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->where('is_published', true)->paginate(10);
        return view('front.list', compact('category', 'posts'));
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->where('is_published', true)->paginate(10);
        return view('front.list', compact('tag', 'posts'));
    }

    public function artikel()
    {
        $artikels = Post::with('kategori', 'tags')->where('jenis_halaman', 'artikel')->where('is_published', true)->get();
        return view('front.artikel', ['artikels' => $artikels]);
    }
    public function kontak()
    {
        return view('front.kontak');
    }
    public function berita()
    {
        $semuaBerita = Post::with('kategori', 'tags')->where('is_published', true)->where('jenis_halaman', 'berita')->get();
        return view('front.semua_berita', compact('semuaBerita'));
    }
}
