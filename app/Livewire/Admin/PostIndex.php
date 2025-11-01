<?php

namespace App\Livewire\Admin;

use App\Models\Tag;
use App\Models\Post;
use Livewire\Component;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PostIndex extends Component
{
    use WithFileUploads;
    public $postId;
    public $title, $slug, $kategori_id, $cover_image, $old_image, $kategoris, $content, $jenis_halaman, $user_id, $is_published, $published_at;
    public $isModalOpen = false, $isEditMode = false;

    public array $tags = [];

    public function isOpenModal()
    {
        $this->isModalOpen = true;
    }
    public function isCloseModal()
    {
        $this->isModalOpen = false;
    }

    public function openEditModal($id)
    {
        $post = Post::with('tags')->findOrFail($id);
        $this->postId = $post->id;
        $this->title = $post->title;
        $this->kategori_id = $post->kategori_id;
        $this->content = $post->content;
        $this->tags = $post->tags->pluck('id')->toArray();
        $this->old_image = $post->cover_image;
        $this->isModalOpen = true;
    }
    public function render()
    {
        $posts = Post::with('kategori')->latest()->get();
        return view('livewire.admin.post-index', ['posts' => $posts]);
    }
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
            'content' => 'required',
            'cover_image' => 'nullable|image|max:2048',
            'jenis_halaman' => 'nullable',
        ]);

        $imagePath = null;
        if ($this->cover_image) {
            $imagePath = $this->cover_image->store('posts', 'public');
        }

        $post = Post::create([
            'title' => $this->title,
            'slug' => $this->slug ?: Str::slug($this->title),
            'kategori_id' => $this->kategori_id,
            'jenis_halaman' => $this->jenis_halaman,
            'content' => $this->content,
            'cover_image' => $imagePath,
            'is_published' => $this->is_published,
            'published_at' => $this->is_published ? now() : null,
            'user_id' => auth()->check() ? auth()->id() : null,
        ]);

        if ($this->tags) {
            $post->tags()->sync($this->tags);
        }

        session()->flash('success', 'Post berhasil dibuat!');
        $this->reset(['title', 'slug', 'kategori_id', 'cover_image']);
        $this->isModalOpen = false;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'nullable|unique:posts,slug,' . $this->postId,
            'kategori_id' => 'required|exists:kategoris,id',
            'tags' => 'array',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        $post = Post::findOrFail($this->postId);
        $imagePath = $post->cover_image;
        if ($this->cover_image) {
            $imagePath = $this->cover_image->store('posts', 'public');
        }

        $post->update([
            'title' => $this->title,
            'slug' => $this->slug ?: Str::slug($this->title),
            'kategori_id' => $this->kategori_id,
            'jenis_halaman' => $this->jenis_halaman,
            'content' => $this->content,
            'cover_image' => $imagePath,
            'is_published' => $this->is_published,
            'published_at' => $this->is_published ? now() : null,
            'user_id' => auth()->check() ? auth()->id() : null,

        ]);
        $post->tags()->sync($this->tags);

        session()->flash('success', 'Post berhasil diupdate!');
        $this->reset(['title', 'kategori_id', 'tags', 'cover_image', 'postId', 'old_image']);
        $this->isModalOpen = false;
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        // $post->tags()->detach();
        $post->delete();
        session()->flash('success', 'Post berhasil dihapus!');
    }
}
