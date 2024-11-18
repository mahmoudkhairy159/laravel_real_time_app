<?php

namespace App\Broadcasting;

use App\Models\Admin;
use App\Models\User;

class NewUserRegisteredChannel
{
    /**
     * Create a new channel instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     */
    public function join(Admin $user): array|bool
    {
        return true;
    }
}
