<?php
declare(strict_types = 1);

namespace Domain\Order;

use Domain\Product;

class OrderItem implements OrderItemInterface
{
    /**
     * @var Product
     */
    protected $product;

    /**
     * @var float
     */
    protected $price;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getSku(): string
    {
        return $this->product->getSku();
    }

    public function getBasePrice(): float
    {
        return $this->product->getPrice();
    }

    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price ?? $this->getBasePrice();
    }
}
