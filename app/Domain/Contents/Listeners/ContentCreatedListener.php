<?php

namespace App\Domain\Contents\Listeners;

use App\Domain\Contents\Events\ContentCreatedEvent;
use App\Domain\Contents\Models\Content;
use App\Models\User;

class ContentCreatedListener
{

    public function __construct()
    {
        //
    }

    public function handle(ContentCreatedEvent $event)
    {
        $event->content->title = "listener";
        $event->content->save();
    }

    public function viaConnection()
    {
        return 'database';
    }

    public function viaQueue()
    {
        return 'default';
    }
}
