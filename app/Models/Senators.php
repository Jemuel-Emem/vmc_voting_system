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


public function groups()
{
    return $this->belongsToMany(Group::class, 'group_senator', 'senator_id', 'group_id');
}
}
