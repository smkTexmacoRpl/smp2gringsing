<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'slug',
        'kategori_id',
        'user_id',
        'content',
        'cover_image',
        'jenis_halaman',
        'is_published',
        'published_at',
    ];

    protected $casts = ['is_published' => 'boolean', 'published_at' => 'datetime'];

    // Automatically generate slug from title if not provided
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title) . '-' . Str::random(6);
            }
        });
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
}
