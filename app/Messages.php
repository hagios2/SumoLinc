<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    public function chat()
    {
        return $this->belongsTo(Conversation::class, 'conversation_id');
    }

    public function userOne()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

}
