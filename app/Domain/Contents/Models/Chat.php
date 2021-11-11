<?php

namespace App\Domain\Contents\Models;

use App\Models\User;

class Chat
{

    public User $user;
    public string $message;

    public function __construct($params)
    {
        $this->user = $params['user'] ?? null;
        $this->message = $params['message'] ?? null;

    }
}
