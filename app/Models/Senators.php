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

public function votings()
{
    return $this->belongsToMany(Voting::class, 'voting_senators');
}
public function groups()
{
    return $this->belongsToMany(Group::class, 'group_senator', 'senator_id', 'group_id');
}
}
