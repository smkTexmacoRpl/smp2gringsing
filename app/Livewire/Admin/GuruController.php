<?php

namespace App\Livewire\Admin;

use App\Models\Guru;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class GuruController extends Component
{

    use WithFileUploads;
    public $isOpenModal, $isEditMode = false;

    public $nama_lengkap, $nip, $jabatan, $foto, $oldfoto,  $guruId;

    public function render()
    {
        // Fetch gurus, order by created_at if the column exists to avoid SQL errors

        $gurus = Guru::orderBy('created_at', 'asc')->get();
        return view('livewire.admin.guru-controller', (['gurus' => $gurus]));
    }
    public function openModal()
    {
        $this->isOpenModal = true;
    }
    public function closeModal()
    {
        $this->isOpenModal = false;
        $this->resetInputFields();
    }
    private function resetInputFields()
    {
        $this->nama_lengkap = '';
        $this->nip = '';
        $this->jabatan = '';
        $this->foto = '';
    }
    public function store()
    {
        // Validate and store guru data logic here
        $this->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nip' => 'required|string|max:100',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|max:1024', // 1MB Max
        ]);
        // Store logic here
        $guru = new Guru();
        $guru->nama_lengkap = $this->nama_lengkap;
        $guru->nip = $this->nip;
        $guru->jabatan = $this->jabatan;

        if ($this->foto) {
            $guru->foto = $this->foto->store('guru', 'public');
        }
        $guru->save();

        session()->flash('success', 'Guru berhasil disimpan.');
        $this->closeModal();
    }
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        $this->guruId = $id;
        $this->nama_lengkap = $guru->nama_lengkap;
        $this->nip = $guru->nip;
        $this->jabatan = $guru->jabatan;
        $this->oldfoto = $guru->foto;
        $this->isEditMode = true;
        $this->isOpenModal = true;
    }
    public function update()
    {
        // Validate and update guru data logic here
        $this->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nip' => 'required|string|max:100',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|max:1024', // 1MB Max
        ]);
        // Update logic here
        $guru = Guru::findOrFail($this->guruId);
        $guru->update([
            'nama_lengkap' => $this->nama_lengkap,
            'nip' => $this->nip,
            'jabatan' => $this->jabatan,
        ]);
        if ($this->foto) {
            $guru->foto = $this->foto->store('guru', 'public');
        }
        $guru->save();

        session()->flash('success', 'Guru berhasil diperbarui.');
        $this->closeModal();
    }
    public function delete($id)
    {
        // Delete guru data logic here
        $guru = Guru::findOrFail($id);
        $guru->delete();
        session()->flash('success', 'Guru berhasil dihapus.');
    }
}
