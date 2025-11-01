<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PrakataKepsek as PrakataModel;

class Prakata extends Component
{
    use WithFileUploads;
    public $title = 'Prakata Kepala Sekolah';
    public $prakatas, $judul, $isi, $kepsek, $foto_kepsek;
    public $prakataId;
    public $isOpenModal = false;



    public function render()
    {
        return view('livewire.admin.prakata', [
            'prakatas' => $this->prakatas = PrakataModel::latest()->get()
        ]);
    }
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
    public function openModal()
    {
        $this->isOpenModal = true;
    }
    public function closeModal()
    {
        $this->isOpenModal = false;
    }

    private function resetInputFields()
    {
        $this->judul = '';
        $this->isi = '';
        $this->kepsek = '';
        $this->foto_kepsek = null;
        $this->prakataId = null;
        $this->resetValidation();
    }
    protected $rules = [
        'judul' => 'required|string|max:255',
        'isi' => 'required|string',
        'kepsek' => 'required|string|max:255',
        'foto_kepsek' => 'nullable|image|max:2048', // Maksimal 2MB
    ];
    protected $messages = [
        'judul.required' => 'Judul wajib diisi.',
        'isi.required' => 'Isi prakata wajib diisi.',
        'kepsek.required' => 'Nama kepala sekolah wajib diisi.',
        'foto_kepsek.image' => 'Foto kepala sekolah harus berupa gambar.',
        'foto_kepsek.max' => 'Ukuran foto kepala sekolah maksimal 2MB.',
    ];
    public function store()
    {
        $this->validate();

        $data = [
            'judul' => $this->judul,
            'isi' => $this->isi,
            'kepsek' => $this->kepsek,
        ];

        if (is_object($this->foto_kepsek)) {
            if ($this->prakataId) {
                $existingPrakata = PrakataModel::find($this->prakataId);
                if ($existingPrakata && $existingPrakata->foto_kepsek && Storage::disk('public')->exists('foto_kepsek/' . $existingPrakata->foto_kepsek)) {
                    Storage::disk('public')->delete('foto_kepsek/' . $existingPrakata->foto_kepsek);
                }
            } else {
                $existingPrakata = null;
            }

            if (is_object($this->foto_kepsek)) {
                $fotoPath = $this->foto_kepsek->store('foto_kepsek', 'public');
                $data['foto_kepsek'] = basename($fotoPath);
            }
        }

        PrakataModel::updateOrCreate(['id' => $this->prakataId], $data);

        session()->flash('message', $this->prakataId ? 'Prakata updated successfully.' : 'Prakata created successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }
    public function edit($id)
    {
        $prakata = PrakataModel::findOrFail($id);
        $this->prakataId = $id;
        $this->judul = $prakata->judul;
        $this->isi = $prakata->isi;
        $this->kepsek = $prakata->kepsek;
        $this->foto_kepsek = null;
        $this->isOpenModal = true;
    }
    public function delete($id)
    {
        $prakata = PrakataModel::find($id);
        if ($prakata->foto_kepsek && Storage::disk('public')->exists('foto_kepsek/' . $prakata->foto_kepsek)) {
            Storage::disk('public')->delete('foto_kepsek/' . $prakata->foto_kepsek);
        }
        $prakata->delete();
        session()->flash('message', 'Prakata deleted successfully.');
    }
}
