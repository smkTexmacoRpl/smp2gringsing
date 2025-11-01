<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use App\Models\Kategori;
use Illuminate\Support\Str;

class BlogCrud extends Component
{
    use WithFileUploads;
    public $blogs, $blogId;
    public $title, $slug, $content, $cover_image, $is_published = false, $kategori_id, $user_id, $published_at, $kategoris;

    public $showModal = false;
    public $tags = [];

    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'cover_image' => 'nullable|image|max:2048',
        'is_published' => 'boolean',

    ];


    public function render()
    {
        $this->blogs = Post::latest()->get();
        return view('livewire.admin.blog-crud');
    }
    public function create()
    {
        $this->resetForm();
        $this->showModal = true;
    }
    public function edit($id)
    {
        $blog = Post::findOrFail($id);
        $this->blogId = $id;
        $this->title = $blog->title;
        $this->slug = $blog->slug;
        $this->content = $blog->content;
        $this->is_published = $blog->is_published;
        $this->published_at = $blog->published_at;
        $this->showModal = true;
    }
    public function save()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'slug' => $this->slug ?: Str::slug($this->title),
            'kategori_id' => $this->kategori_id,
            'content' => $this->content,
            'is_published' => $this->is_published,
            'published_at' => $this->is_published ? now() : null,
            'user_id' => auth()->check() ? auth()->id() : null,
        ];

        if ($this->cover_image) {
            $path = $this->cover_image->store('covers', 'public');
            $data['cover_image'] = $path;
        }


        $blog = Post::updateOrCreate(['id' => $this->blogId], $data);
        if ($this->tags) {
            $blog->tags()->sync($this->tags);
        }

        session()->flash('message', $this->blogId ? 'Blog updated successfully.' : 'Blog created successfully.');

        $this->resetForm();
        $this->showModal = false;
    }

    public function delete($id)
    {
        Post::findOrFail($id)->delete();
        session()->flash('message', 'Blog deleted successfully.');
    }


    private function resetForm()
    {
        $this->reset(['blogId', 'title', 'slug', 'content', 'cover_image', 'is_published', 'published_at']);
    }
}
