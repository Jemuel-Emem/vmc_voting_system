<?php

namespace App\Livewire\Admin;

use App\Models\Voting;
use App\Models\President;
use App\Models\Vicepres;
use App\Models\Senators;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Result extends Component
{
    // public function render()
    // {
    //     $presidents = President::withCount(['votings as votes' => function ($query) {
    //         $query->select(DB::raw("count(*)"));
    //     }])->get();

    //     $vicepres = Vicepres::withCount(['votings as votes' => function ($query) {
    //         $query->select(DB::raw("count(*)"));
    //     }])->get();

    //     // Count senator votes manually (since it's stored as JSON array)
    //     $senatorVotes = Senators::all()->map(function ($senator) {
    //         $count = Voting::whereJsonContains('senator_ids', (string) $senator->id)->count();

    //         $senator->votes = $count;
    //         return $senator;
    //     });

    //     return view('livewire.admin.result', compact('presidents', 'vicepres', 'senatorVotes'));
    // }

    public function render()
{
    $presidents = President::withCount(['votings as votes' => function ($query) {
        $query->select(DB::raw("count(*)"));
    }])->orderByDesc('votes')->get(); // Sorting by votes

    $vicepres = Vicepres::withCount(['votings as votes' => function ($query) {
        $query->select(DB::raw("count(*)"));
    }])->orderByDesc('votes')->get(); // Sorting by votes

    // Count senator votes manually (since it's stored as JSON array)
    $senatorVotes = Senators::all()->map(function ($senator) {
        $count = Voting::whereJsonContains('senator_ids', (string) $senator->id)->count();
        $senator->votes = $count;
        return $senator;
    })->sortByDesc('votes'); // Sorting by votes

    return view('livewire.admin.result', compact('presidents', 'vicepres', 'senatorVotes'));
}

}
