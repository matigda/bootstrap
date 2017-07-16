<?php
declare(strict_types = 1);

namespace Infrastructure\Doctrine\Dbal;

use Doctrine\DBAL\Connection;
use AppBundle\ReadModel\CartView\CartView;
use AppBundle\ReadModel\CartView\ProductCartView;
use AppBundle\ReadModel\Query\CartViewQueryInterface;

class DbalCartStorage implements CartViewQueryInterface
{
    /**
     * @var Connection
     */
    protected $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getCart(string $cartId): CartView
    {
        $queryBuilder = $this->connection->createQueryBuilder();
        $queryBuilder
            ->select('c.product_name', 'c.items')
            ->from('cart', 'c')
            ->where('c.id = :cId')
            ->setParameter('cId', $cartId)
            ;

        $usersData = $this->connection->fetchAll($queryBuilder->getSQL(), $queryBuilder->getParameters());

        return new CartView(array_map(function(array $userData) {
            return new ProductCartView($userData['email'], $userData['username']);
        }, $usersData));
    }
}
