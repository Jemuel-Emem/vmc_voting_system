<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Senators extends Model
{
    protected $fillable = [
    'name',
    'year',
    'section',
    'image'
];

}
