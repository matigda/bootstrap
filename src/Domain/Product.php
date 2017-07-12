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

    public function __construct(string $id, string $name, string $size, string $sku)
    {
        $this->id = $id;
        $this->name = $name;
        $this->size = $size;
        $this->sku = $sku;
    }
}
