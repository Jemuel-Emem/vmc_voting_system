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
    public function render()
    {
        // PRESIDENT VOTES: Getting total votes for each president
        $presidents = President::withCount(['votings as votes' => function ($query) {
            $query->select(DB::raw("count(*)"));
        }])->orderByDesc('votes')->get();

        // VICE PRESIDENT VOTES: Getting total votes for each vice president
        $vicepres = Vicepres::withCount(['votings as votes' => function ($query) {
            $query->select(DB::raw("count(*)"));
        }])->orderByDesc('votes')->get();

        // SENATORS VOTES: Getting total votes for each senator
        $senators = Senators::all()->map(function ($senator) {
            // Counting votes across multiple senator fields (senator_id_1 to senator_id_4)
            $senator->votes = Voting::where('senator_id_1', $senator->id)
                ->orWhere('senator_id_2', $senator->id)
                ->orWhere('senator_id_3', $senator->id)
                ->orWhere('senator_id_4', $senator->id)
                ->count();
            return $senator;
        })->sortByDesc('votes')->values(); // Sorting senators by votes in descending order

        // Returning the view with all necessary data
        return view('livewire.admin.result', compact('presidents', 'vicepres', 'senators'));
    }
}
