<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $guarded = ['id'];
    
    public function message()
    {
        return $this->hasMany(Messages::class);
    }

    public function addMessage($sender, $recipient, $message)
    {
        $this->message()->create([

            'sender_id' => $sender,

            'recipient_id' => $recipient,

            'message' => $message,
        ]);
    }


    public function user1()
    {
        
        return $this->belongsTo('App\User', 'user1_id');
        
    }


    public function user2()
    {
        
        return $this->belongsTo('App\User', 'user2_id');
        
    }

}
