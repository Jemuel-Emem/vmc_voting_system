<?php

namespace App\Livewire\Admin;
use App\Models\User;
use App\Models\Group;
use App\Models\Voting;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $totalStudents = User::where('is_admin', 0)
        ->count();


        $totalParties = Group::count();

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
            $votes = 0;
            if ($group->president_id && $votesCount->has($group->president_id)) {
                $votes = $votesCount->get($group->president_id)->votes;
            }

            return [
                'name' => $group->group_name,
                'votes' => $votes,
                'color' => $colors[$index % count($colors)] ?? 'rgba(0, 0, 0, 0.8)'
            ];
        });

        return view('livewire.admin.index', [
            'totalStudents' => $totalStudents,
            'totalParties' => $totalParties,
            'votesData' => $votesData,
        ]);
    }
}
