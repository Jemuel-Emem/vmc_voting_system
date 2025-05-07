<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Group;
use App\Models\Voting;
use App\Models\President;
use App\Models\Vicepres;
use App\Models\Senators as Senator;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        // Count total students and parties
        $totalStudents = User::where('is_admin', 0)->count();
        $totalParties = Group::count();

        // PRESIDENT VOTES
        $presidents = President::all()->map(function ($president) {
            $president->votes = Voting::where('president_id', $president->id)->count();
            return $president;
        });

        // VICE PRESIDENT VOTES
        $vicepres = Vicepres::all()->map(function ($vp) {
            $vp->votes = Voting::where('vice_president_id', $vp->id)->count();
            return $vp;
        });
$senators = Senator::all()->map(function ($senator) {
    $senator->votes = Voting::where('senator_id_1', $senator->id)
        ->orWhere('senator_id_2', $senator->id)
        ->orWhere('senator_id_3', $senator->id)
        ->orWhere('senator_id_4', $senator->id)
        ->count();
    return $senator;
});




        // Votes per party for chart
        $groups = Group::with('president')->get();
        $presidentIds = $groups->pluck('president_id')->filter();

        $votesCount = Voting::whereIn('president_id', $presidentIds)
            ->selectRaw('president_id, count(*) as votes')
            ->groupBy('president_id')
            ->get()
            ->keyBy('president_id');

        $colors = [
            'rgba(59, 130, 246, 0.8)',
            'rgba(239, 68, 68, 0.8)',
            'rgba(139, 92, 246, 0.8)',
            'rgba(16, 185, 129, 0.8)',
            'rgba(245, 158, 11, 0.8)',
        ];

        $votesData = $groups->map(function ($group, $index) use ($votesCount, $colors) {
            $votes = $votesCount[$group->president_id]->votes ?? 0;
            return [
                'name' => $group->group_name,
                'votes' => $votes,
                'color' => $colors[$index % count($colors)],
            ];
        });

        return view('livewire.admin.index', [
            'totalStudents' => $totalStudents,
            'totalParties' => $totalParties,
            'presidents' => $presidents,
            'vicepres' => $vicepres,
            'senators' => $senators,
            'votesData' => $votesData,
        ]);
    }
}
