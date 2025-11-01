<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Menu;
use Livewire\WithPagination;

class MenuDropdown extends Component
{
    use WithPagination;

    public $nama, $url, $parent_id, $urutan, $menuId;
    public $isModalOpen = false;

    protected $rules = [
        'nama' => 'required|string|max:100',
        'url' => 'nullable|string|max:255',
        'parent_id' => 'nullable|integer',
        'urutan' => 'nullable|integer'
    ];

    public function render()
    {
        return view('livewire.menu-dropdown', [
            'menus' => Menu::with('children')->whereNull('parent_id')->orderBy('urutan')->paginate(10),
            'parents' => Menu::whereNull('parent_id')->get()
        ]);
    }

    public function create()
    {
        $this->resetInput();
        $this->openModal();
    }
    public function store()
    {
        $this->validate();
        Menu::updateOrCreate(['id' => $this->menuId], [
            'nama' => $this->nama,
            'url' => $this->url,
            'parent_id' => $this->parent_id,
            'urutan' => $this->urutan ?? 0
        ]);
        session()->flash('message', $this->menuId ? 'Menu berhasil diperbarui!' : 'Menu baru berhasil ditambahkan!');
        $this->closeModal();
    }
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $this->menuId = $menu->id;
        $this->nama = $menu->nama;
        $this->url = $menu->url;
        $this->parent_id = $menu->parent_id;
        $this->urutan = $menu->urutan;
        $this->openModal();
    }

    public function delete($id)
    {
        Menu::findOrFail($id)->delete();
        session()->flash('message', 'Menu berhasil dihapus!');
    }

    private function resetInput()
    {
        $this->menuId = null;
        $this->nama = '';
        $this->url = '';
        $this->parent_id = null;
        $this->urutan = 0;
    }

    private function openModal()
    {
        $this->isModalOpen = true;
    }

    private function closeModal()
    {
        $this->isModalOpen = false;
    }
}
