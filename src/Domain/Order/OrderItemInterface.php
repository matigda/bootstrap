<?php
declare(strict_types = 1);

namespace Domain\Order;

interface OrderItemInterface
{
    public function getBasePrice(): float;

    public function setPrice(float $price);

    public function getPrice(): float;
}
