<?php

namespace App\Domain\Contents\Events;

use App\Domain\Contents\Models\Chat;
use App\Events\Broadcastable;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatEvent implements ShouldBroadcast, Broadcastable
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Chat $chat;

    public function __construct(Chat $chat)
    {
        //
        $this->chat = $chat;
    }

    public function broadcastOn(): Channel
    {
        return new PresenceChannel('chatroom');
    }

    public function broadcastAs(): string
    {
        return "chat";
    }

    public function broadcastWith(): array
    {
        return [
            'chat' => $this->chat

        ];
    }
}
