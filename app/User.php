<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'image',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    public function testings()
    {
        return $this->hasMany(Testing::class);
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = $value;
        $this->attributes['image'] = 'https://robohash.org/' .  $this->email .'?gravatar=yes';
    }
}
