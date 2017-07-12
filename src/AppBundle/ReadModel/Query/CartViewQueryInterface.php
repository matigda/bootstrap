<?php
declare(strict_types = 1);

namespace ApppBundle\ReadModel\Query;

use AppBundle\ReadModel\CartView\CartView;

interface CartViewQueryInterface
{
    public function getCart(string $cartId): CartView;
}
