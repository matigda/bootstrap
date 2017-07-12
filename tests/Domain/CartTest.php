<?php
declare(strict_types = 1);

namespace Tests\Domain;

use Domain\Cart;
use Domain\Product;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function testAddingProductToCart()
    {
        $cart = new Cart();

        $cart->addProduct($firstProduct = new Product('xx', 'some name', 'xs', 'XX-KK-WQ'));
        $cart->addProduct($secondProduct = new Product('xx', 'some name', 'xs', 'XX-KK-WQ'));

        $products = $cart->getProducts();

        $this->assertContains($firstProduct, $products);
        $this->assertContains($secondProduct, $products);
        $this->assertSame(2, count($products));
    }
}
