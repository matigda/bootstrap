<?php
declare(strict_types = 1);

namespace AppBundle\ReadModel\CartView;

class CartView
{
    /**
     * @var ProductCartView[]
     */
    private $products;

    public function __construct(array $products)
    {
        $this->products = $products;
    }
}
