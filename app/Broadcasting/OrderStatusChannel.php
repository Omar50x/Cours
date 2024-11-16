<?php

namespace App\Broadcasting;

use App\Models\Order;
use App\Models\User;

class OrderStatusChannel
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
    // public function join(User $user): array|bool
    // {
    //     //
    // }
    public function join(User $user, $orderId)
    {
        // Allow only the user who owns the order to listen to it
        return $user->id === Order::find($orderId)->user_id;
    }
}
