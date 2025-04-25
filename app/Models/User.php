<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // app/Models/User.php
// app/Models/User.php
public function groups()
{
    return $this->belongsToMany(Group::class);
}

public function participant()
{
    return $this->hasOne(Participant::class);
}

public function president()
{
    return $this->hasOne(President::class, 'user_id');
}

public function vicepres()
{
    return $this->hasOne(Vicepres::class, 'user_id');
}

public function senators()
{
    return $this->hasOne(Senators::class, 'user_id');
}
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
