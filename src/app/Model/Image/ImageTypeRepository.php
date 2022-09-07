<?php declare(strict_types=1);

namespace App\Model\Repository;

use App\Model\Entity\ImageType;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\OptimisticLockException;


final class ImageTypeRepository extends EntityRepository
{

    /**
     * @var EntityManager
     */
    private EntityManager $em;

    /**
     * ImageTypeRepository constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager, new ClassMetadata(ImageType::class));

        $this->em = $entityManager;
    }

    /**
     * @param int $id
     * @return ImageType|null
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function findImageType(int $id): ?ImageType
    {
        $imagetype = $this->em->find(ImageType::class, $id);

        if ($imagetype instanceof ImageType) {
            return $imagetype;
        }
        return null;
    }

    /**
     * Find entity ImageType by advanced criteria.
     * @param array $criteria
     * @param array $order
     * @param int|null $limit
     * @param int|null $offset
     * @return ImageType[]
     */
    public function findImageTypesBy(
        array $criteria = array(),
        array $order = array(),
        int $limit = null,
        int $offset = null
    ): array {
        return $this->findBy($criteria, $order, $limit, $offset);
    }

    /**
     * Find entity ImageType by advanced criteria.
     * @param array $criteria
     * @param array $order
     * @param int|null $limit
     * @param int|null $offset
     * @return ImageType
     */
    public function findImageTypeBy(
        array $criteria = array(),
        array $order = array(),
        int $limit = null,
        int $offset = null
    ): ImageType {
        return $this->findOneBy($criteria, $order, $limit, $offset);
    }

    /**
     * @param array $criteria
     * @return int
     */
    public function countImageTypes(array $criteria): int
    {
        return $this->count($criteria);
    }

    /**
     * @param $name
     * @return ImageType
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function createImageType($name): ImageType
    {
        $entity = new ImageType();
        $entity->setName($name);

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }


    /**
     * @param ImageType $imagetype
     * @throws \Exception
     */
    public function removeImageType(ImageType $imagetype): void
    {
        $this->em->remove($imagetype);
        $this->em->flush();
    }
}
