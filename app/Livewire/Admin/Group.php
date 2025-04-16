<?php

namespace App\Livewire\Admin;

use App\Models\Group as Team;
use App\Models\President;
use App\Models\Senators;
use App\Models\Vicepres;
use Livewire\Component;

class Group extends Component
{
    public $showModal = false;
    public $group_name;
    public $selectedPresident;
    public $selectedVicepres;
    public $selectedSenators = [];

    public $groups;
public $showSenatorModal = false;
public $senatorList = [];
public $activeGroupName = '';


    public function mount()
{
    $this->groups = Team::with('president', 'vicepres')->get();
}

public function showSenators($groupId)
{
    $group = Team::findOrFail($groupId);
    $senatorIds = json_decode($group->senators_id, true);

    $this->senatorList = Senators::whereIn('id', $senatorIds)->get();
    $this->activeGroupName = $group->group_name;
    $this->showSenatorModal = true;
}
    public function save()
    {
        $this->validate([
            'group_name' => 'required|string|max:255',
            'selectedPresident' => 'required|exists:presidents,id',
            'selectedVicepres' => 'required|exists:vicepres,id',
            'selectedSenators' => 'required|array|size:4',
            'selectedSenators.*' => 'exists:senators,id',
        ]);

        Team::create([
            'group_name' => $this->group_name,
            'president_id' => $this->selectedPresident,
            'vicepres_id' => $this->selectedVicepres,
            'senators_id' => json_encode($this->selectedSenators),
        ]);

        $this->reset(['showModal', 'group_name', 'selectedPresident', 'selectedVicepres', 'selectedSenators']);
        session()->flash('message', 'Group added successfully.');
    }

    public function render()
    {
        return view('livewire.admin.group', [
            'presidents' => President::all(),
            'vicepresidents' => Vicepres::all(),
            'senators' => Senators::all(),
        ]);
    }
}
