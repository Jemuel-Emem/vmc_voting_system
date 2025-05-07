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
    'senator_id_1',
    'senator_id_2',
    'senator_id_3',
    'senator_id_4',
];


}
