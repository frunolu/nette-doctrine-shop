<?php declare(strict_types = 1);

namespace App\Model\Repository;

use App\Model\Entity\Image;
use App\Model\Entity\ImageType;
use App\Model\Entity\Product;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\OptimisticLockException;
use Exception;


final class ImageRepository extends EntityRepository {

    /**
     * @var EntityManager
     */
    private EntityManager $em;

    /**
     * ImageRepository constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager) {
        parent::__construct($entityManager, new ClassMetadata(Image::class));

        $this->em = $entityManager;
    }

    /**
     * @param int $id
     * @return Image|null
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function findImage(int $id) : ?Image
    {
        $image = $this->em->find(Image::class, $id);

        if($image instanceof Image) {
            return $image;
        }
        return null;
    }

    /**
     * Find entity Image by advanced criteria.
     * @param array $criteria
     * @param array $order
     * @param int|null $limit
     * @param int|null $offset
     * @return Image[]
     */
    public function findImagesBy(array $criteria = array(), array $order = array(), int $limit = NULL, int $offset = NULL): array
    {
        return $this->findBy($criteria, $order, $limit, $offset);
    }

    /**
     * Find entity Image by advanced criteria.
     * @param array $criteria
     * @param array $order
     * @param int|null $limit
     * @param int|null $offset
     * @return Image
     */
    public function findImageBy(array $criteria = array(), array $order = array(), int $limit = NULL, int $offset = NULL): Image
    {
        return $this->findOneBy($criteria, $order, $limit, $offset);
    }

    /**
     * @param array $criteria
     * @return int
     */
    public function countImages(array $criteria): int
    {
        return $this->count($criteria);
    }

    /**
     * @param Product $product
     * @param ImageType $imageType
     * @param $full
     * @param $thumb
     * @return Image
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function createImage(Product $product, ImageType $imageType, $full, $thumb) : Image {
        $entity = new Image();
        $entity->setProperty($product);
        $entity->setImageType($imageType);
        $entity->setFull($full);
        $entity->setThumb($thumb);
        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }


    /**
     * @param Image $image
     * @throws Exception
     */
    public function removeImage(Image $image) : void {
        $this->em->remove($image);
        $this->em->flush();
    }
}
