<?php

declare(strict_types=1);

namespace Domain;

class Product
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $size;

    /**
     * @var string
     */
    private $sku;

    /**
     * @var float
     */
    private $price;

    public function __construct(string $id, string $name, string $size, string $sku, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->size = $size;
        $this->sku = $sku;
        $this->price = $price;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
