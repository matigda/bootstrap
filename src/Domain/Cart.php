<?php

declare(strict_types=1);

namespace Domain;

class Cart
{
    /**
     * @var Product[]
     */
    protected $products;

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function getProducts(): array
    {
        return $this->products;
    }
}
