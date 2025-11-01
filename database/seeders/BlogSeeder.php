<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::first() ?? User::factory()->create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => bcrypt('password')]);

        $cat1 = Kategori::create(['nama_kategori' => 'Berita Sekolah', 'slug' => 'berita-sekolah']);
        $cat2 = Kategori::create(['nama_kategori' => 'Prestasi', 'slug' => 'prestasi']);

        $t1 = Tag::create(['name' => 'Prestasi']);
        $t2 = Tag::create(['name' => 'Kurikulum']);
        $t3 = Tag::create(['name' => 'Ekstrakurikuler']);

        $p = Post::create([
            'kategori_id' => $cat1->id,
            'user_id' => $admin->id,
            'title' => 'Sambutan Kepala Sekolah Tahun Ajaran Baru',
            'slug' => Str::slug('Sambutan Kepala Sekolah Tahun Ajaran Baru'),
            'excerpt' => 'Sambutan kepala sekolah untuk menyambut tahun ajaran baru...',
            'content' => '<p>Selamat datang di tahun ajaran baru ...</p>',
            'is_published' => true,
            'published_at' => now()
        ]);
        $p->tags()->attach([$t1->id, $t2->id, $t3->id]);

        // beberapa post sample
    }
}
