<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;

interface Broadcastable
{

    public function broadcastOn(): Channel;

    public function broadcastAs(): string;

    public function broadcastWith(): array;
}

