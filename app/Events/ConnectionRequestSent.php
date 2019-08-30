<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;


class ConnectionRequestSent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $connection;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($connection)
    {
        $this->connection = $connection;
    }


}
