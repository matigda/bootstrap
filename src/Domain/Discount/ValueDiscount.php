<?php
declare(strict_types = 1);

namespace Domain\Discount;

class ValueDiscount extends Discount
{
    public function calculateDiscount(float $price): float
    {
        return $price - $this->amount;
    }
}
