<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [

        'user_id', 'summary', 'birthdate', 'country', 'state',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    

    public function createProfile($attributes)
    {
        $this->owner()->create([

            'summary' => $attributes->summary,

            'birthdate' => $attributes->date,

            'country' => $attributes->country,

            'state' => $attributes->state,
        ]);
    }
}
