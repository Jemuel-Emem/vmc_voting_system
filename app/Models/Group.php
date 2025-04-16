<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'group_name',
        'president_id',
        'vicepres_id',
        'senators_id', // assuming you're storing this as a JSON field
    ];

    public function president()
{
    return $this->belongsTo(President::class, 'president_id');
}

public function vicepres()
{
    return $this->belongsTo(Vicepres::class, 'vicepres_id');
}
public function participants(): HasMany
{
    return $this->hasMany(Participant::class);
}
}
