<?php

namespace App;

use App\Events\MessageSent;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{

    protected $guarded = ['id'];


    protected $dispatchesEvents = [

        'created' => MessageSent::class,
    ];

    public function chat()
    {
        return $this->belongsTo(Conversation::class, 'conversation_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

}
