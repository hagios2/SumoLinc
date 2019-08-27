<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public function message()
    {
        return $this->hasMany(Messages::class);
    }
}
