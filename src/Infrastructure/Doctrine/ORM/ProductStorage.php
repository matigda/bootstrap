<?php
declare(strict_types = 1);

namespace Infrastructure\Doctrine\ORM;

use Domain\Product;
use Doctrine\ORM\EntityManager;
use Domain\ProductStorageInterface;

class ProductStorage implements ProductStorageInterface
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function add(Product $product)
    {
        $this->entityManager->persist($product);
        $this->entityManager->flush();
    }
}
