<?php
declare(strict_types = 1);

namespace Domain\Cart;

use Domain\Coupon\Coupon;
use Domain\Order\OrderItemInterface;

class CalculateCartPriceService
{
    public function calculate(Cart $cart): float
    {
        $coupons = $cart->getCoupons();

        foreach ($coupons as $coupon) {
            foreach ($cart->getItems() as $item) {
                $this->applyCoupon($coupon, $item);
            }
        }

        foreach ($coupons as $coupon) {
            $this->applyCoupon($coupon, $cart);
        }

        return $cart->getPrice();
    }

    private function applyCoupon(Coupon $coupon, OrderItemInterface $item)
    {
        if ($coupon->supportsItem($item)) {
            $coupon->applyDiscount($item);
        }
    }
}
