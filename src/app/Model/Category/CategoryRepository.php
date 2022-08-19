<?php
declare(strict_types=1);

namespace App\Model\Repository;

use App\Model\Entity\Category;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

use Nette\Caching\Cache;
use Tracy\Debugger;

class CategoryRepository extends EntityRepository
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * CategoryRepository constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager, new ClassMetadata(Category::class));
        $this->em = $entityManager;
    }


    public function getEntityName(): string
    {
        return Category::class;
    }

    /**
     * @param int $id
     * @return Category
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function findCategoryById(int $id): ?Category
    {
        $category = $this->em->find(Category::class, $id);
        if ($category instanceof Category) {
            return $category;
        }
        return null;
    }

    public function findCategoryByUrl(string $url): ?Category
    {
        $qb = $this->em->createQueryBuilder();

        $qb->select('c');
        $qb->from('App\Model\Entity\Category', 'c');
        $qb->andWhere('c.url = :url');
        $qb->setParameter('url', $url);
        //     Debugger::barDump($qb->getQuery()->getResult()[0]);
        return $qb->getQuery()->getResult()[0];
    }

    public function findProductsOfCategoryByCategoryId($categoryId): array
    {
        $qb = $this->em->createQueryBuilder();
        $qb->select('cxp');
        $qb->from('App\Model\Entity\CategoryXProduct', 'cxp');
        $qb->andWhere('cxp.category = :category_id');
        $qb->setParameter('category_id', $categoryId);
        Debugger::barDump($qb->getQuery()->getResult());
        return $qb->getQuery()->getResult();
    }

    /**
     * Find entity Category by advanced criteria.
     * @param array $criteria
     * @param array $order
     * @param int $limit
     * @param int $offset
     * @return Category[]
     */
    public function findCategoriesBy(array $criteria = array(), array $order = array(), $limit = null, $offset = null)
    {
        return $this->findBy($criteria, $order, $limit, $offset);
    }

    /**
     * Find entity Category by advanced criteria.
     * @param array $criteria
     * @param array $order
     * @param int $limit
     * @param int $offset
     * @return Category
     */
    public function findCategoryBy(array $criteria = array(), array $order = array(), $limit = null, $offset = null)
    {
        return $this->findOneBy($criteria, $order, $limit, $offset);
    }

    /**
     * @param array $criteria
     * @return int
     */
    public function countCategories(array $criteria)
    {
        return $this->count($criteria);
    }

    /**
     * @param Category $category
     * @throws \Exception
     */
    public function removeCategory(Category $category): void
    {
        $this->em->remove($category);
        $this->em->flush();
    }

}


