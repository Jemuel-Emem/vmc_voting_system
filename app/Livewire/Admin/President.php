<?php

namespace App\Livewire\Admin;
use Livewire\WithFileUploads;
use App\Models\President as p;
use Livewire\Component;

class President extends Component
{
    use WithFileUploads;
    public $name,$image, $year, $section, $showModal = false, $editId = null;

    public function render()
    {
        return view('livewire.admin.president', [
            'president' => p::latest()->get()
        ]);
    }
    public function save()
    {
        $this->validate([
            'name' => 'required|string',
            'year' => 'required|string',
            'section' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;

        if ($this->image) {
            $imagePath = $this->image->store('senator_images', 'public');
        }

        p::updateOrCreate(
            ['id' => $this->editId],
            ['name' => $this->name,
            'year' => $this->year,
            'section' => $this->section,
            'image' => $imagePath ?? p::find($this->editId)?->image,]
        );

        $this->reset(['name', 'year', 'section', 'showModal','image', 'editId']);
    }

    public function edit($id)
    {
        $vp = p::findOrFail($id);
        $this->name = $vp->name;
        $this->year = $vp->year;
        $this->section = $vp->section;
        $this->editId = $vp->id;
        $this->showModal = true;
    }

    public function delete($id)
    {
        p::findOrFail($id)->delete();
    }
}
