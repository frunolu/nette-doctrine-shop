<?php
declare(strict_types=1);

namespace App\Model\Repository;

use App\Model\Entity\Product;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ClassMetadata;
use Tracy\Debugger;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\TransactionRequiredException;
use Doctrine\ORM\Exception\ORMException;
use DateTime;


class ProductRepository extends EntityRepository
{

    /**
     * @var EntityManager
     */
    private EntityManager $em;

    /**
     * PropertyRepository constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager) {
        parent::__construct($entityManager, new ClassMetadata(Product::class));

        $this->em = $entityManager;
    }

    /**
     * @param $id
     * @return Product|null
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws TransactionRequiredException
     */
    public function findProduct($id) : ?Product {
        $product = $this->em->find(Product::class, $id);

        if($product instanceof Product) {
            return $product;
        }
        return null;
    }

    public function findProductByUrl(string $url): ?Product
    {
        $qb = $this->em->createQueryBuilder();
        $qb->select('p');
        $qb->from('App\Model\Entity\Product', 'p');
        $qb->andWhere('p.url = :url');
        $qb->setParameter('url', $url);
        Debugger::barDump($qb->getQuery()->getResult()[0]);
        return $qb->getQuery()->getResult()[0];
    }

    /**
     * @param array $criteria
     * @param array $sort
     * @param int|null $limit
     * @param int|null $offset
     * @return Product[]
     */
    public function findProductsForGrid(array $criteria = [], array $sort = [], int $limit = null, int $offset = null): array
    {
        $qb = $this->em->createQueryBuilder();

        $qb->select('p');
        $prepareStatement = $qb->from('App\Model\Entity\Product','p');
        if(!empty($criteria[0])){

        }
        if(!empty($criteria[1]))
        {

            if(isset($criteria[1]['priceFrom'])){
                $prepareStatement->andWhere('p.price >= :startPrice');
                $prepareStatement->setParameter('startPrice', $criteria[1]['priceFrom']);
            }

            if(isset($criteria[1]['priceTo'])){
                $prepareStatement->andWhere('p.price <= :endPrice');
                $prepareStatement->setParameter('endPrice', $criteria[1]['priceTo']);
            }
        }

        return $prepareStatement->getQuery()
            ->setMaxResults($limit)
            ->setFirstResult($offset)
            ->getResult();

    }

}
