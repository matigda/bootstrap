<?php
declare(strict_types = 1);

namespace AppBundle\ReadModel\CartView;

class ProductCartView
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
    }
}
