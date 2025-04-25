<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class President extends Model
{
    //

    protected $fillable = [
        'name',
        'year',
        'section',
        'image'
    ];

    public function votings()
{
    return $this->hasMany(\App\Models\Voting::class, 'president_id');
}

public function group()
{
    return $this->hasOne(Group::class);
}

}
