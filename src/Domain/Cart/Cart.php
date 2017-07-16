<?php

declare(strict_types=1);

namespace Domain\Cart;

use Domain\Order\OrderItem;
use Domain\Coupon\Coupon;
use Domain\Order\OrderItemInterface;

class Cart implements OrderItemInterface
{
    /**
     * @var OrderItem[]
     */
    protected $items;

    /**
     * @var Coupon[]
     */
    protected $coupons = [];

    /**
     * @var float
     */
    protected $price;

    public function addItem(OrderItem $item)
    {
        $this->items[] = $item;
    }

    /**
     * @return OrderItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function addCoupon(Coupon $coupon)
    {
        $this->coupons[] = $coupon;
    }

    /**
     * @return Coupon[]
     */
    public function getCoupons(): array
    {
        return $this->coupons;
    }

    public function getBasePrice(): float
    {
        return (float) array_sum(array_map(function(OrderItem $item) {
            return $item->getPrice();
        }, $this->items));
    }

    public function getPrice(): float
    {
        return $this->price ?? $this->getBasePrice();
    }

    public function setPrice(float $price)
    {
        $this->price = $price;
    }
}
