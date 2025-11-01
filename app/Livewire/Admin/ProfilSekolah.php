<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Profil_Sekolah;
use Livewire\WithFileUploads;


class ProfilSekolah extends Component
{
    use WithFileUploads;
    public $nama_sekolah, $alamat, $telepon, $email, $visi, $misi, $profilId, $logo;
    public $profilSekolah;
    public $isOpenModal = false;

    public function render()
    {
        $this->profilSekolah = Profil_Sekolah::latest()->get();
        return view('livewire.admin.profil-sekolah', ['profilSekolah' => $this->profilSekolah]);
    }
    public function openModal()
    {
        $this->isOpenModal = true;
    }
    public function closeModal()
    {
        $this->isOpenModal = false;
    }
    public function resetForm()
    {
        $this->nama_sekolah = '';
        $this->alamat = '';
        $this->telepon = '';
        $this->email = '';
        $this->visi = '';
        $this->misi = '';
        $this->logo = null;
        $this->profilId = null;
        $this->resetValidation();
    }
    protected $rules = [
        'nama_sekolah' => 'required|string|max:255',
        'alamat' => 'required|string|max:500',
        'telepon' => 'required|string|max:20',
        'email' => 'required|email|max:255',
        'visi' => 'required|string',
        'misi' => 'required|string',
    ];
    protected $messages = [
        'nama_sekolah.required' => 'Nama sekolah wajib diisi.',
        'alamat.required' => 'Alamat wajib diisi.',
        'telepon.required' => 'Telepon wajib diisi.',
        'email.required' => 'Email wajib diisi.',
        'visi.required' => 'Visi wajib diisi.',
        'misi.required' => 'Misi wajib diisi.',
    ];
    public function store()
    {
        $this->validate();

        Profil_Sekolah::updateOrCreate(
            ['id' => $this->profilId],
            [
                'nama_sekolah' => $this->nama_sekolah,
                'alamat' => $this->alamat,
                'telepon' => $this->telepon,
                'email' => $this->email,
                'visi' => $this->visi,
                'misi' => $this->misi,
                'logo' => $this->logo,
            ]
        );

        session()->flash('message', $this->profilId ? 'Profil sekolah berhasil diperbarui.' : 'Profil sekolah berhasil ditambahkan.');

        $this->closeModal();
        $this->resetForm();
    }
    public function edit($id)
    {
        $profil = Profil_Sekolah::findOrFail($id);
        $this->profilId = $id;
        $this->nama_sekolah = $profil->nama_sekolah;
        $this->alamat = $profil->alamat;
        $this->telepon = $profil->telepon;
        $this->email = $profil->email;
        $this->visi = $profil->visi;
        $this->misi = $profil->misi;

        $this->openModal();
    }
    public function delete($id)
    {
        $profil = Profil_Sekolah::findOrFail($id);
        $profil->delete();
        session()->flash('message', 'Profil sekolah berhasil dihapus.');
    }
}
