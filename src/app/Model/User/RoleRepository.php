<?php

namespace App\Model\Repository;

use App\Model\Entity\Category;
use App\Model\Entity\Role;
use App\Model\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Tracy\Debugger;

class RoleRepository extends EntityRepository
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
        parent::__construct($entityManager, new ClassMetadata(Role::class));
        $this->em = $entityManager;
    }
    public function findByUserId(int $id)
    {
        return $this->getAll()
            ->where(':user_x_role.user.id', $id);
 }

    public function findUserById(int $id):?User
    {
        $qb = $this->em->createQueryBuilder();
        $qb->select('uxr');
        $qb->from('App\Model\Entity\Role', 'uxr');
        $qb->andWhere('uxr.user_id = :user.id');
        $qb->setParameter('user.id', $id);
        Debugger::barDump($qb->getQuery()->getResult());
        return $qb->getQuery()->getResult();
    }
}
