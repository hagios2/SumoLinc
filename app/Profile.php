<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [

        'user_id', 'summary', 'BirthDate', 'country', 'State',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }


}
