<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class voting_senator extends Model
{
    protected $fillable = [
        'voting_id',
        'senator_id',

    ];

}
