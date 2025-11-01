<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Kategori;
use Illuminate\Support\Str;

class CategoryController extends Component
{
    public $categories, $nama_kategori, $slug, $kategoriId;
    public $updateMode = false;
    public $search = '';
    protected $queryString = ['search'];
    public $isModalOpen = false;


    protected $rules = [
        'nama_kategori' => 'required|string|max:255',
    ];
    protected $messages = [
        'nama_kategori.required' => 'Nama kategori wajib diisi.',
    ];



    public function render()
    {
        $this->categories = Kategori::where('nama_kategori', 'like', '%' . $this->search . '%')
            ->orWhere('slug', 'like', '%' . $this->search . '%')->get();
        return view('livewire.admin.category-controller', ['categories' => $this->categories]);
    }
    public function openModal()
    {
        $this->resetForm();
        $this->isModalOpen = true;
    }
    public function closeModal()
    {
        $this->isModalOpen = false;
    }
    private function resetForm()
    {
        $this->nama_kategori = '';
        $this->slug = '';
        $this->kategoriId = null;
        $this->updateMode = false;
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();

        Kategori::updateOrCreate(
            ['id' => $this->kategoriId],
            [
                'nama_kategori' => $this->nama_kategori,
                'slug' => Str::slug($this->nama_kategori),
            ]
        );

        session()->flash('message', $this->kategoriId ? 'Kategori berhasil diperbarui.' : 'Kategori berhasil ditambahkan.');

        $this->closeModal();
        $this->resetForm();
    }

    public function edit($id)
    {
        $category = Kategori::findOrFail($id);
        $this->kategoriId = $id;
        $this->nama_kategori = $category->nama_kategori;
        $this->isModalOpen = true;
    }
    public function delete($id)
    {
        Kategori::find($id)->delete();
        session()->flash('message', 'Kategori berhasil dihapus!');
    }
}
