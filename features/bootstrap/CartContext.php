<?php

use Behat\Behat\Context\Context;
use Domain\Cart\CalculateCartPriceService;
use Domain\Cart\Cart;
use Domain\Coupon\CartCoupon;
use Domain\Coupon\ItemCoupon;
use Domain\Discount\PercentageDiscount;
use Domain\Discount\ValueDiscount;
use Domain\Order\OrderItem;
use PHPUnit\Framework\Assert;
use Behat\Gherkin\Node\TableNode;
use Domain\Product;
use Ramsey\Uuid\Uuid;

/**
 * Defines application features from the specific context.
 */
class CartContext implements Context
{
    /**
     * @var Product[]
     */
    protected $products = [];

    /**
     * @var Cart
     */
    protected $cart;

    /**
     * @Given there are following products:
     */
    public function thereAreFollowingProductsInMyCart(TableNode $productsTable)
    {
        foreach ($productsTable->getHash() as $productHash) {
            $this->products[] = new Product(Uuid::uuid4(), $productHash['name'], $productHash['size'], $productHash['sku'], $productHash['price']);
        }
    }

    /**
     * @When I add them to the cart
     */
    public function iAddThemTheToTheCart()
    {
        $this->cart = new Cart();

        foreach ($this->products as $product) {
            $this->cart->addItem(new OrderItem($product));
        }
    }

    /**
     * @Then I should have :amount products in the cart
     */
    public function iShouldHaveProductsInTheCart($amount)
    {
        Assert::assertEquals(
            $amount,
            count($this->cart->getItems())
        );
    }

    /**
     * @Then the overall cart price should be :price
     */
    public function theOverallCartPriceShouldBe($price)
    {
        Assert::assertEquals(
            $price,
            (new CalculateCartPriceService())->calculate($this->cart)
        );
    }

    /**
     * @When I add cart coupon with :amount percent discount
     */
    public function iAddCartCouponWithPercentDiscount($amount)
    {
        $this->cart->addCoupon(new CartCoupon(new PercentageDiscount($amount), new DateTime()));
    }

    /**
     * @When I add cart coupon with :amount value discount
     */
    public function iAddCartCouponWithValueDiscount($amount)
    {
        $this->cart->addCoupon(new CartCoupon(new ValueDiscount($amount), new DateTime()));
    }

    /**
     * @When I add product coupon to product with :sku sku with :discountAmount percent discount
     */
    public function iAddProductCouponToProductWithSkuWithPercentDiscount($sku, $discountAmount)
    {
        $this->cart->addCoupon(new ItemCoupon(new PercentageDiscount($discountAmount), new DateTime(), $sku));
    }

    /**
     * @When I add product coupon to product with :sku sku with :discountAmount value discount
     */
    public function iAddProductCouponToProductWithSkuWithValueDiscount($sku, $discountAmount)
    {
        $this->cart->addCoupon(new ItemCoupon(new ValueDiscount($discountAmount), new DateTime(), $sku));
    }
}
