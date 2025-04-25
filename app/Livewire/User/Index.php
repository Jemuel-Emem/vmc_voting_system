<?php

namespace App\Livewire\User;
use App\Models\Participant;
use App\Models\Group;
use App\Models\President;
use App\Models\Vicepres;
use App\Models\Senators;
use App\Models\Voting;
use Livewire\Component;

class Index extends Component
{
    public $selectedGroup;
    public $selectedPresident;
    public $selectedVicepres;
    public $selectedSenators = [];
    public $instructions;

    // public function render()
    // {
    //     return view('livewire.user.index', [
    //         'groups' => Group::with(['president', 'vicepres'])->get(),
    //         'presidents' => President::all(),
    //         'vicepresidents' => Vicepres::all(),
    //         'senators' => Senators::all(),
    //     ]);
    // }


    public function render()
{

    $groups = Group::with(['president', 'vicepres'])->get();


    $presidentIds = $groups->pluck('president_id')->filter()->unique();


    $vicepresIds = $groups->pluck('vicepres_id')->filter()->unique();


    $senatorIds = $groups->pluck('senators_id')
        ->map(function ($senatorsIdJson) {
            return json_decode($senatorsIdJson, true) ?: [];
        })
        ->flatten()
        ->unique();

    return view('livewire.user.index', [
        'groups' => $groups,
        'presidents' => President::whereIn('id', $presidentIds)->get(),
        'vicepresidents' => Vicepres::whereIn('id', $vicepresIds)->get(),
        'senators' => Senators::whereIn('id', $senatorIds)->get(),
    ]);
}
    public function updatedSelectedGroup($groupId)
    {
        if ($groupId) {
            $group = Group::find($groupId);
            $this->selectedPresident = $group->president_id;
            $this->selectedVicepres = $group->vicepres_id;
            $this->selectedSenators = json_decode($group->senators_id, true) ?? [];
        } else {
            $this->reset(['selectedPresident', 'selectedVicepres', 'selectedSenators']);
        }
    }

    public function submitVote()
    {
        if (Voting::where('user_id', auth()->id())->exists()) {
            session()->flash('message', 'You have already submitted your vote.');
            return;
        }
        $this->validate([

            'selectedPresident' => 'required|exists:presidents,id',
            'selectedVicepres' => 'required|exists:vicepres,id',
            'selectedSenators' => 'required|array|size:4',
            'selectedSenators.*' => 'exists:senators,id',

        ]);


        Voting::create([
            'user_id' => auth()->id(),
            'president_id' => $this->selectedPresident,
            'vice_president_id' => $this->selectedVicepres,
            'senator_ids' => json_encode($this->selectedSenators),
        ]);

        session()->flash('message', 'Vote submitted successfully!');
        $this->reset();
    }

}
