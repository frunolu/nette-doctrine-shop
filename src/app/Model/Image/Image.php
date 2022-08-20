<?php

namespace App\Model\Entity;


use Doctrine\ORM\Mapping as ORM;


/**
 * Class Image
 *
 * @ORM\Entity(repositoryClass="App\Model\Repository\ImageRepository")
 * @ORM\Table(name="image")
 * @package App\Model\Entity
 */
class Image
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Product
     *
     * @ORM\ManyToOne(targetEntity=Product::class)
     * @ORM\JoinColumn(referencedColumnName="id", name="product_id")
     */
    private $product;

    /**
     * @var ImageType
     *
     * @ORM\ManyToOne(targetEntity=imageType::class)
     * @ORM\JoinColumn(referencedColumnName="id", name="imageType_id")
     */
    private $imageType;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $full;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $thumb;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return Product
     */
    public function getProperty(): Product
    {
        return $this->property;
    }

    /**
     * @param Product $property
     */
    public function setProperty(Product $property): void
    {
        $this->property = $property;
    }

    /**
     * @return ImageType
     */
    public function getImageType(): ImageType
    {
        return $this->imageType;
    }

    /**
     * @param ImageType $imageType
     */
    public function setImageType(ImageType $imageType): void
    {
        $this->imageType = $imageType;
    }

    /**
     * @return string
     */
    public function getFull(): string
    {
        return $this->full;
    }

    /**
     * @param string $full
     */
    public function setFull(string $full): void
    {
        $this->full = $full;
    }

    /**
     * @return string
     */
    public function getThumb(): string
    {
        return $this->thumb;
    }

    /**
     * @param string $thumb
     */
    public function setThumb(string $thumb): void
    {
        $this->thumb = $thumb;
    }


}
