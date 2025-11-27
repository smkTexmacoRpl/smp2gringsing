<?php

// use App\Http\Controllers\KategoriController;
use App\Livewire\Admin\PostForm;
use App\Livewire\Admin\PostIndex;
use App\Livewire\Admin\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Livewire\Admin\CategoryController;

Route::get('/home', [SiteController::class, 'home'])->name('home1');
Route::get('/posts/{slug}', [SiteController::class, 'show'])->name('posts.show');
Route::get('/categori/{slug}', [SiteController::class, 'category'])->name('categori.show');
Route::get('/tag/{slug}', [SiteController::class, 'tag'])->name('tag.show');
Route::get('/artikel', [SiteController::class, 'artikel'])->name('artikel.index');
Route::get('/berita', [SiteController::class, 'berita'])->name('semua-berita');


Route::get('/kontak', [SiteController::class, 'kontak'])->name('kontak.index');
Route::get('/sambutan', [SiteController::class, 'sambutan'])->name('sambutan.index');




Route::get('/', function () {
 return view('front.home');
})->name('home');
Route::get('/galeri', [App\Http\Controllers\GaleriController::class, 'index'])->name('galeri.index');
Route::get('/visi_misi', [App\Http\Controllers\ProfilController::class, 'index'])->name('visi-misi');
Route::get('/prakata', [App\Http\Controllers\ProfilController::class, 'prakata'])->name('prakata');

Route::get('/detail_berita', [App\Http\Controllers\BlogController::class, 'index'])->name('detail-berita');
Route::get('/sejarah', [App\Http\Controllers\ProfilController::class, 'sejarah'])->name('sejarah');
Route::get('/struktur_organisasi', [App\Http\Controllers\ProfilController::class, 'struktur'])->name('struktur-organisasi');
Route::get('/guru_tedik', [App\Http\Controllers\ProfilController::class, 'guru'])->name('daftar-guru');




// Route::get('/kategori', function () {
//     return view('kategori.index');
// });

Route::middleware(['auth'])->prefix('admin')->group(function () {
 // Route::get('/', fn() => redirect()->route('admin.posts'))->name('admin.dashboard');
 // // Livewire components (index & form)
 // // Route::get('/posts', PostIndex::class)->name('admin.posts');
 // Route::get('/posts/create', PostForm::class)->name('admin.posts.create');
 // Route::get('/posts/{id}/edit', PostForm::class)->name('admin.posts.edit');
 // categories & tags simple resource controllers (or Livewire similarly)
 // Route::resource('categories', CategoryController::class)->except(['show']);
 // Route::resource('tags', TagController::class)->except(['show']);
 Route::get('/dashboard', function () {
  return view('admin.dashboard');
 })->name('admin.dashboard');
 Route::get('kategori', function () {
  return view('admin.kategori.index');
 })->name('admin.kategori');
 Route::get('/tag', function () {
  return view('admin.tag.index');
 })->name('admin.tag');
 Route::get('/profil-sekolah', function () {
  return view('admin.webconfig.profile-sekolah');
 })->name('admin.profil-sekolah');
 Route::get('/guru', function () {
  return view('admin.webconfig.guru');
 })->name('admin.guru');

 Route::get('/prakata', function () {
  return view('admin.webconfig.prakata');
 })->name('admin.prakata');

 Route::get('/menu', function () {
  return view('admin.webconfig.menu');
 })->name('admin.menu');
 Route::get('/counter', function () {
  return view('admin.webconfig.counter');
 })->name('admin.counter');

 Route::get('galeri', function () {
  return view('admin.galeri.index');
 })->name('admin.galeri');

 Route::get('jenis', function () {
  return view('admin.jenisPage');
 })->name('admin.jenis');
 Route::get('blogs', function () {
  return view('admin.post.index');
 })->name('admin.blogs');
 Route::get('posts', function () {
  return view('admin.post.index');
 })->name('admin.posts');
});
require __DIR__ . '/auth.php';
