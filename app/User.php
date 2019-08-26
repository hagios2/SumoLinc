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
        'name', 'email', 'password','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function social()
    {
        return $this->hasOne(SocialMedia::class);
    }

    public function skill()
    {
        return $this->hasMany(Skills::class);
    }


    public function project()
    {
        return $this->hasMany(Projects::class);
    }

    public function experience()
    {
        return $this->hasMany(WorkingExperience::class);
    }

    public function connections()
    {
        return $this->hasMany(Connections::class);
    }


    public function addConnection($following_id)
    {

        $this->connections()->create(compact('following_id'));

    }
}
