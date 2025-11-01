<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Tag;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class TagController extends Component
{
    public $name, $tagId, $slug;
    public $updateMode = false;
    public $search;
    public $isModalOpen = false;
    use WithPagination;


    protected $rules = [
        'name' => 'required|string|max:255',
    ];
    protected $messages = [
        'name.required' => 'Nama tag wajib diisi.',
    ];

    public function render()
    {

        return view('livewire.admin.tag-controller', [
            'tags' => Tag::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('slug', 'like', '%' . $this->search . '%')->latest()->paginate(5)
        ]);
    }
    public function resetInputFields()
    {
        $this->name = '';
        $this->tagId = null;
    }
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
    public function openModal()
    {
        $this->isModalOpen = true;
        $this->updateMode = false;
        $this->resetInputFields();
    }
    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->resetInputFields();
    }
    public function store()
    {
        $this->slug = Str::slug($this->name, '-');
        Tag::updateOrCreate(['id' => $this->tagId], [
            'name' => $this->name,
            'slug' => $this->slug,
        ]);
        session()->flash('message', $this->tagId ? 'Tag updated successfully.' : 'Tag created successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        $this->tagId = $id;
        $this->name = $tag->name;
        $this->isModalOpen = true;
    }
    public function delete($id)
    {
        Tag::find($id)->delete();
        session()->flash('message', 'Tag deleted successfully.');
        $this->resetInputFields();
    }
}
