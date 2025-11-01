<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Galeri;
use App\Models\Kategori;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class GaleriCrud extends Component
{
    use WithFileUploads;
    public $kategori_id, $fotos = [], $galeriId, $judul, $deskripsi, $galeries, $oldFotos = [];
    public $kategoris;
    public $isOpenModal = false,
        $isEditMode = false;

    protected $rules = [
        'kategori_id' => 'required|integer',
        'judul' => 'required|string|max:255',
        'fotos.*' => 'image|max:2048', // 2MB Max
    ];
    public function mount()
    {
        $this->kategoris = Kategori::all();
    }

    public function render()
    {
        $this->galeries = Galeri::latest()->get();
        return view('livewire.admin.galeri-crud', [
            'galeri' => $this->galeries,
            'kategoris' => $this->kategoris
        ]);
    }
    // public function store()
    // {
    //     $this->validate();
    //     foreach ($this->fotos as $foto) {
    //         $fotoPath = $foto->store('galeri', 'public');
    //         Galeri::create([
    //             'kategori_id' => $this->kategori_id,
    //             'foto' => $fotoPath,
    //             'judul' => $this->judul,
    //             'deskripsi' => $this->deskripsi,
    //         ]);
    //     }

    //     session()->flash('message', 'Foto berhasil ditambahkan.');

    //     // Reset form fields
    //     $this->reset(['kategori_id', 'fotos', 'judul', 'deskripsi']);
    // }
    public function openModal($id = null)
    {
        $this->resetValidation();
        $this->isOpenModal = true;
        $this->reset(['judul', 'kategori_id', 'fotos', 'oldFotos', 'deskripsi']);
        $this->isEditMode = $id ? true : false;
        if ($id) {
            $galeri = Galeri::findOrFail($id);
            $this->galeriId = $galeri->id;
            $this->judul = $galeri->judul;
            $this->kategori_id = $galeri->kategori_id;
            $this->deskripsi = $galeri->deskripsi;
            $this->oldFotos = $galeri->fotos ?? [];
        }
    }
    public function save()
    {
        $this->validate();

        $data = [
            'judul' => $this->judul,
            'kategori_id' => $this->kategori_id,
            'deskripsi' => $this->deskripsi,
        ];

        $uploaded = [];

        if ($this->fotos) {
            foreach ($this->fotos as $img) {
                $path = $img->store('galeri', 'public');
                $uploaded[] = $path;
            }
        }

        if ($this->isEditMode && $this->galeriId) {
            $galeri = Galeri::findOrFail($this->galeriId);

            // gabung foto lama + baru
            $merged = array_merge($this->oldFotos ?? [], $uploaded);
            $galeri->update(array_merge($data, ['fotos' => $merged]));

            session()->flash('success', 'Galeri berhasil diperbarui!');
        } else {
            $data['fotos'] = $uploaded;
            Galeri::create($data);
            session()->flash('success', 'Galeri berhasil ditambahkan!');
        }

        $this->closeModal();
    }
    public function removeImage($index)
    {
        if (isset($this->oldFotos[$index])) {
            Storage::disk('public')->delete($this->oldFotos[$index]);
            unset($this->oldFotos[$index]);
            $this->oldFotos = array_values($this->oldFotos); // reindex
        }
    }

    public function delete($id)
    {
        $galeri = Galeri::findOrFail($id);
        if ($galeri->fotos) {
            foreach ($galeri->fotos as $img) {
                Storage::disk('public')->delete($img);
            }
        }
        $galeri->delete();
        session()->flash('message', 'Foto berhasil dihapus.');
    }

    public function closeModal()
    {
        $this->isOpenModal = false;
        $this->reset(['kategori_id', 'fotos', 'judul', 'deskripsi', 'galeriId']);
    }
}
