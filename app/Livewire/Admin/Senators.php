<?php

namespace App\Livewire\Admin;
use Livewire\WithFileUploads;
use App\Models\Senators as s;
use Livewire\Component;

class Senators extends Component
{
    use WithFileUploads;
    public $name, $year, $section,  $image;
    public $showModal = false;

    public $editId = null;

public function edit($id)
{
    $senator = s::findOrFail($id);
    $this->name = $senator->name;
    $this->year = $senator->year;
    $this->section = $senator->section;
    $this->editId = $senator->id;
    $this->showModal = true;
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

    s::updateOrCreate(
        ['id' => $this->editId],
        [
            'name' => $this->name,
            'year' => $this->year,
            'section' => $this->section,
            'image' => $imagePath ?? s::find($this->editId)?->image,
        ]
    );

    $this->reset(['name', 'year', 'section', 'image', 'showModal', 'editId']);
}

public function delete($id)
{
    s::findOrFail($id)->delete();
}
    public function render()
    {
        return view('livewire.admin.senators', [
            'senators' => s::latest()->get()
        ]);
    }
}
