<?php

namespace App\Model\Repository;

use App\Model\Entity\Article;
use App\Model\Entity\Product;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Nette\InvalidArgumentException;
use Nette\Utils\ArrayHash;
use Nette\Utils\DateTime;
use Tracy\Debugger;

class ArticleRepository extends EntityRepository
{
    /**
     * @var EntityManager
     */
    private $em;
    /**
     * ArticleRepository constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager) {
        parent::__construct($entityManager, new ClassMetadata(Article::class));
        $this->em = $entityManager;
    }

    public function getAll()
    {
        $qb = $this->em->createQueryBuilder();
        $qb->select('a');
        $qb->from('App\Model\Entity\Article', 'a');
        return $qb->getQuery()->getResult();
    }
    /**
     * Najde a vrátí článek podle jeho ID.
     * @param int|NULL ID článku
     * @return Article|NULL vrátí entitu článku nebo NULL pokud článek nebyl nalezen
     */
    public function getArticle($id)
    {
        return isset($id) ? $this->em->find(Article::class, $id) : NULL;
    }

}
