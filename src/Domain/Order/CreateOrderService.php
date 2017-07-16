<?php

declare(strict_types=1);

namespace Domain\Order;

use Domain\User;
use Domain\Cart\Cart;

class CreateOrderService
{
    public function createFromCartForUser(Cart $cart, User $user): Order
    {
        // podaj orderowi shipping address
        $order = new Order();

        foreach ($cart->getItems() as $item) {

        }

        return $order;
    }
}
