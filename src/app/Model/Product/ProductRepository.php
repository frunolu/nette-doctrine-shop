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
        $property = $this->em->find(Product::class, $id);

        if($property instanceof Product) {
            return $property;
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

}
