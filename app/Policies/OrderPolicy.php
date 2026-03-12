<?php

namespace App\Policies;

use App\Models\Orders;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function author(User $user, Orders $order)
    {
        if ($order->user_id == $user->id) {
            return true;
        } else {
            return false;
        }
    }

    public function payment(User $user, Orders $order)
    {
        if ($order->status == 2) {
            return false;
        } else {
            return true;
        }
    }
}
