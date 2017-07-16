<?php
declare(strict_types = 1);

namespace Domain\Coupon;

use Domain\Cart\Cart;
use Domain\Order\OrderItemInterface;

class CartCoupon extends Coupon
{
    public function supportsItem(OrderItemInterface $item): bool
    {
        return get_class($item) === Cart::class;
    }
}
