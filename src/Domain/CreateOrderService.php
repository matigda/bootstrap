<?php

declare(strict_types=1);

namespace Domain;

class CreateOrderService
{
    public function createFromCartForUser(Cart $cart, User $user): Order
    {
        // podaj orderowi shipping address
        $order = new Order();

        foreach ($cart->getProducts() as $product) {

        }

        return $order;
    }
}
