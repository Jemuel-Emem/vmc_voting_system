<?php

namespace App\Livewire\Admin;
use Livewire\WithFileUploads;
use App\Models\vicepres as VP;
use Livewire\Component;

class Vicepres extends Component
{
    use WithFileUploads;
    public $name,$image, $year, $section, $showModal = false, $editId = null;

    public function render()
    {
        return view('livewire.admin.vicepres', [
            'vicepresidents' => VP::all()
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
            $imagePath = $this->image->store('Vice_images', 'public');
        }
        VP::updateOrCreate(
            ['id' => $this->editId],
            ['name' => $this->name,
             'year' => $this->year,
             'section' => $this->section,
             'image' => $imagePath ?? VP::find($this->editId)?->image,]

        );

        $this->reset(['name', 'year', 'section', 'showModal', 'editId', 'image']);
    }

    public function edit($id)
    {
        $vp = VP::findOrFail($id);
        $this->name = $vp->name;
        $this->year = $vp->year;
        $this->section = $vp->section;
        $this->editId = $vp->id;
        $this->showModal = true;
    }

    public function delete($id)
    {
        VP::findOrFail($id)->delete();
    }
}
