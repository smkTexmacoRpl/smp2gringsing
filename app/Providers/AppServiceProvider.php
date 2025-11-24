<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share(['appName' => 'SMP Negeri 2 Gringsing', 'appName2' => 'Smp-Negeri-2-Gringsing']);
        if (Schema::hasTable('menus')) {
            $menus = Menu::with('children')->whereNull('parent_id')->orderBy('urutan')->get();
            View::share('menus', $menus);
        }

        if (Schema::hasTable('posts')) {
            $latestPosts = \App\Models\Post::where(['is_published' => true, 'jenis_halaman' => 'berita'])
                ->orderBy('published_at', 'desc')
                ->take(5)
                ->get();
            $related = \App\Models\Post::where('kategori_id', $latestPosts->first()->kategori_id)->where('id', '!=', $latestPosts->first()->id)->take(4)->get();
            View::share('latestPosts', $latestPosts);
            View::share('related', $related);
        }
        if (Schema::hasTable('prakatas')) {
            $prakata = \App\Models\Prakata::first();
            View::share('prakata', $prakata);
        }
        if (Schema::hasTable('profil_sekolahs')) {
            $visi = \App\Models\ProfilSekolah::first();
            View::share('visi', $visi);
        }
    }
}
