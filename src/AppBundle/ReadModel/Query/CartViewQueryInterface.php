<?php
declare(strict_types = 1);

namespace AppBundle\ReadModel\Query;

use AppBundle\ReadModel\CartView\CartView;

interface CartViewQueryInterface
{
    public function getCart(string $cartId): CartView;
}
