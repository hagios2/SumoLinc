<?php

namespace App;

use App\Events\ConnectionRequestSent;
use Illuminate\Database\Eloquent\Model;

class Connections extends Model
{
    protected $guarded = ['id'];

    protected $dispatchesEvents = [

        'created' => ConnectionRequestSent::class,

    ];

    public function connectedTo()
    {
        return $this->hasOne(User::class, 'following_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
