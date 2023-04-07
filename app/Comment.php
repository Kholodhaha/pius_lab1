<?php

namespace App;
use App\User;

class Comment {
    public User $user;
    private string $message;

    public function __construct(
        User $user, 
        string $message
        ) 
    {
        $this->user = $user;
        $this->message = $message;
    }
}