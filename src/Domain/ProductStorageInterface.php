<?php
declare(strict_types = 1);

namespace Domain;

interface ProductStorageInterface
{
    public function add(Product $product);
}
