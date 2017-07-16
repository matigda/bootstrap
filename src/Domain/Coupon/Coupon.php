<?php
declare(strict_types = 1);

namespace Domain\Coupon;

use DateTime;
use Domain\Discount\Discount;
use Domain\Order\OrderItemInterface;

abstract class Coupon
{
    /**
     * @var Discount
     */
    protected $discount;

    /**
     * @var DateTime
     */
    protected $dueDate;

    public function __construct(Discount $discount, DateTime $dueDate)
    {
        $this->discount = $discount;
        $this->dueDate = $dueDate;
    }

    public function applyDiscount(OrderItemInterface $item)
    {
        $item->setPrice($this->discount->calculateDiscount($item->getPrice()));
    }

    public abstract function supportsItem(OrderItemInterface $item): bool;
}
