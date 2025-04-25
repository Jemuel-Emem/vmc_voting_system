<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
   // app/Models/Voting.php

   protected $fillable = [
    'user_id',
    'president_id',
    'vice_president_id',
    'senator_ids',
];

protected $casts = [
    'senator_ids' => 'array',
];

}
