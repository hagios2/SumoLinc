<?php

namespace App\Listeners;

use App\Events\ConnectionRequestSent;
use App\Mail\ConnectionCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class ConnectionRequestNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ConnectionRequestSent  $event
     * @return void
     */
    public function handle(ConnectionRequestSent $event)
    {
        Mail::to($event->connection->connectedTo->email)->send(new ConnectionCreated($event->connection));
    }
}
