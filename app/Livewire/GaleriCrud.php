<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Galeri;
use App\Models\Kategori;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class GaleriCrud extends Component
{
    use withFileUploads;

    public $kategori_id, $fotos = [], $galeri_id, $judul, $deskripsi, $galeries;
    public $kategoris;
    public $isOpenModal = false, $isEditMode = false;


    protected $rules = [
        'kategori_id' => 'required|integer',
        'fotos.*' => 'image|max:1024', // 1MB Max
    ];
    public function mount()
    {
        $this->kategoris = Kategori::all();
    }

    public function render()

    {

        $this->galeries = Galeri::latest()->get();
        return view('livewire.galeri-crud', [
            'galeri' => $this->galeries,
            'kategoris' => $this->kategoris
        ]);
    }
    public function store()
    {
        $this->validate();
        foreach ($this->fotos as $foto) {
            $fotoPath = $foto->store('galeri', 'public');
            Galeri::create([
                'kategori_id' => $this->kategori_id,
                'foto' => $fotoPath,
            ]);
        }
        Galeri::create([
            'kategori_id' => $this->kategori_id,
            'foto' => $fotoPath,
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
        ]);

        session()->flash('message', 'Foto berhasil ditambahkan.');

        // Reset form fields
        $this->reset(['kategori_id', 'fotos', 'judul', 'deskripsi']);
    }
    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        $this->galeri_id = $id;
        $this->kategori_id = $galeri->kategori_id;
        $this->judul = $galeri->judul;
        $this->deskripsi = $galeri->deskripsi;
    }
    public function delete($id)
    {
        $galeri = Galeri::findOrFail($id);
        $galeri->delete();

        session()->flash('message', 'Foto berhasil dihapus.');
    }
    public function update()
    {
        $this->validate([
            'kategori_id' => 'required|integer',
            'fotos.*' => 'image|max:1024', // 1MB Max
        ]);

        $galeri = Galeri::findOrFail($this->galeri_id);

        if ($this->fotos) {
            // Hapus foto lama jika ada
            if ($galeri->foto && Storage::disk('public/galeri')->exists($galeri->foto)) {
                Storage::disk('public/galeri')->delete($galeri->foto);
            }

            // Simpan foto baru
            $fotoPath = $this->fotos->store('galeri', 'public');
            $galeri->foto = $fotoPath;
        }

        $galeri->kategori_id = $this->kategori_id;
        $galeri->judul = $this->judul;
        $galeri->deskripsi = $this->deskripsi;
        $galeri->save();

        session()->flash('message', 'Foto berhasil diperbarui.');

        // Reset form fields
        $this->reset(['kategori_id', 'gambar', 'judul', 'deskripsi', 'galeri_id']);
    }
}
