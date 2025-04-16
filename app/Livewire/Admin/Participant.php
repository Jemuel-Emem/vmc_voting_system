<?php

namespace App\Livewire\Admin;

use App\Models\Participant as P;
use App\Models\Group;
use Livewire\Component;

class Participant extends Component
{
    public $showModal = false;
    public $selectedGroups = []; // Changed to array for multiple selection
    public $instructions;

    public $participants;

    public function mount()
    {
        $this->participants = P::with('group')->get();
    }

    public function save()
    {
        $this->validate([
            'selectedGroups' => 'required|array|min:1',
            'selectedGroups.*' => 'exists:groups,id',
            'instructions' => 'nullable|string',
        ]);

        foreach ($this->selectedGroups as $groupId) {
            P::create([
                'group_id' => $groupId,
                'instructions' => $this->instructions,
            ]);
        }

        $this->reset(['showModal', 'selectedGroups', 'instructions']);
        session()->flash('message', 'Participants added successfully.');
    }

    public function render()
    {
        return view('livewire.admin.participant', [
            'groups' => Group::all(),
        ]);
    }
}
