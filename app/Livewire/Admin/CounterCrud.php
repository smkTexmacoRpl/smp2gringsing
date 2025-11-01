<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Counter;

class CounterCrud extends Component
{
    public $counters;
    public $counterId, $siswa, $guru, $kelas, $tendik, $staff, $penghargaan, $alumni;
    public $isOpenModal = 0;
    public $isEditMode = false;

    public function openModal()
    {
        $this->isOpenModal = true;
        $this->resetInputFields();
    }

    public function closeModal()
    {
        $this->isOpenModal = false;
    }
    private function resetInputFields()
    {
        $this->counterId = null;
        $this->siswa = '';
        $this->guru = '';
        $this->kelas = '';
        $this->tendik = '';
        $this->staff = '';
        $this->penghargaan = '';
        $this->alumni = '';
    }

    public function render()
    {
        $this->counters = Counter::latest()->get();
        return view('livewire.admin.counter-crud', ['counters' => $this->counters]);
    }
    public function store()
    {
        $this->validate([
            'siswa' => 'required|numeric',
            'guru' => 'required|numeric',
            'kelas' => 'nullable|numeric',
            'tendik' => 'required|numeric',
            'staff' => 'nullable|numeric',
            'penghargaan' => 'nullable|numeric',
            'alumni' => 'nullable|numeric',
        ]);

        Counter::updateOrCreate(['id' => $this->counterId], [
            'siswa' => $this->siswa,
            'guru' => $this->guru,
            'kelas' => $this->kelas,
            'tendik' => $this->tendik,
            'staff' => $this->staff,
            'penghargaan' => $this->penghargaan,
            'alumni' => $this->alumni,
        ]);

        session()->flash(
            'message',
            $this->counterId ? 'Counter Updated Successfully.' : 'Counter Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }
    public function edit($id)
    {
        $counter = Counter::findOrFail($id);
        $this->counterId = $id;
        $this->siswa = $counter->siswa;
        $this->guru = $counter->guru;
        $this->kelas = $counter->kelas;
        $this->tendik = $counter->tendik;
        $this->staff = $counter->staff;
        $this->penghargaan = $counter->penghargaan;
        $this->alumni = $counter->alumni;

        $this->isOpenModal = true;
    }
    public function delete($id)
    {
        Counter::find($id)->delete();
        session()->flash('message', 'Counter Deleted Successfully.');
    }
}
