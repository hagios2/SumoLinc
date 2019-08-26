<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Connections extends Model
{
    protected $guarded = ['id'];

    public function connectedTo()
    {
        return $this->hasOne(User::class, 'following_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
