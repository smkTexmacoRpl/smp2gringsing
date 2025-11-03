<?php

namespace App\Livewire\Admin;

use App\Models\Guru;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class GuruController extends Component

{
    use WithFileUploads;

    public $gurus, $nama_lengkap, $nip, $jabatan, $foto, $guru_id, $old_foto;
    public $isModalOpen = false;

    public function render()
    {
        $this->gurus = Guru::latest()->get();
        return view('livewire.admin.guru-controller');
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->nama_lengkap = '';
        $this->nip = '';
        $this->jabatan = '';
        $this->foto = null;
        $this->guru_id = '';
    }

    public function store()
    {
        $this->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nip' => 'required|string|max:50',
            'jabatan' => 'required|string|max:100',
            'foto' => 'nullable|image|max:2048',
        ]);
        $guru = Guru::find($this->guru_id);

        // Jika ada upload foto baru
        if ($this->foto) {
            // Hapus foto lama (jika ada)
            if ($guru && $guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }

            // Simpan foto baru
            $fotoPath = $this->foto->store('guru', 'public');
        } else {
            // Jika tidak upload baru, gunakan foto lama
            $fotoPath = $guru ? $guru->foto : null;
        }

        Guru::updateOrCreate(['id' => $this->guru_id], [
            'nama_lengkap' => $this->nama_lengkap,
            'nip' => $this->nip,
            'jabatan' => $this->jabatan,
            'foto' => $fotoPath,
        ]);

        session()->flash('message', $this->guru_id ? 'Data berhasil diperbarui.' : 'Data berhasil ditambahkan.');

        $this->closeModal();
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        $this->guru_id = $id;
        $this->nama_lengkap = $guru->nama_lengkap;
        $this->nip = $guru->nip;
        $this->jabatan = $guru->jabatan;
        $this->foto = null;
        $this->openModal();
    }

    public function delete($id)
    {
        $guru = Guru::find($id);
        if ($guru) {
            // Hapus foto dari storage jika ada
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }
            $guru->delete();
            session()->flash('message', 'Data berhasil dihapus.');
        }
    }
}
