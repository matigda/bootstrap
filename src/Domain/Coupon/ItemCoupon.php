<?php
declare(strict_types = 1);

namespace Domain\Coupon;

use DateTime;
use Domain\Discount\Discount;
use Domain\Order\OrderItem;
use Domain\Order\OrderItemInterface;

class ItemCoupon extends Coupon
{
    /**
     * @var string
     */
    private $itemSku;

    public function __construct(Discount $discount, DateTime $dueDate, string $itemSku)
    {
        parent::__construct($discount, $dueDate);
        $this->itemSku = $itemSku;
    }

    public function supportsItem(OrderItemInterface $item): bool
    {
        return get_class($item) === OrderItem::class && $item->getSku() === $this->itemSku;
    }
}
