<?php
declare(strict_types = 1);

namespace Domain\Discount;

class PercentageDiscount extends Discount
{
    public function calculateDiscount(float $price): float
    {
        return ( 100 - $this->amount ) / 100  * $price;
    }
}
