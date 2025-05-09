<?php

namespace App\Livewire\User;

use App\Models\President;
use App\Models\Vicepres;
use App\Models\Senators;
use Livewire\Component;

class Welcome extends Component
{
    public function render()
    {
        $presidents = President::all();
        $vicepres = Vicepres::all();
        $senators = Senators::all();

        return view('livewire.user.welcome', compact('presidents', 'vicepres', 'senators'));
    }
}
