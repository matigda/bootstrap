<?php
declare(strict_types = 1);

namespace Domain\Discount;

abstract class Discount
{
    /**
     * @var float
     */
    protected $amount;

    public function __construct(float $amount)
    {
        $this->amount = $amount;
    }

    public abstract function calculateDiscount(float $price): float;
}
