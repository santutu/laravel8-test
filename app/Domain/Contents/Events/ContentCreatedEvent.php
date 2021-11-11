<?php

namespace App\Domain\Contents\Events;

use App\Domain\Contents\Models\Content;
use App\Events\Broadcastable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ContentCreatedEvent implements ShouldBroadcast, Broadcastable
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public Content $content;

    public function __construct(Content $content)
    {
        $this->content = $content;
    }

    public function broadcastOn(): Channel
    {
        return new Channel('contents-channel');
    }

    public function broadcastAs(): string
    {
        return 'contents.created';
    }

    public function broadcastWith(): array
    {
        return ['content' => $this->content];
    }

}
