<?php

namespace App\Model\Entity;


use Doctrine\ORM\Mapping as ORM;
use App\Model\Repository\ProductRepository;
/**
 * Class Product
 *
 * @ORM\Entity(repositoryClass="App\Model\Repository\ProductRepository")
 * @ORM\Table(name="product")
 * @package App\Model\Entity
 */
class Product
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $shortDescription;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="float")
     */
    private $oldPrice;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ratingSum;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ratings;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stock;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $imagesCount;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $hidden;


    public function getId()
    {
        return $this->id;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code): void
    {
        $this->code = $code;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url): void
    {
        $this->url = $url;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    public function setShortDescription($shortDescription): void
    {
        $this->shortDescription = $shortDescription;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function getOldPrice()
    {
        return $this->oldPrice;
    }

    public function setOldPrice($oldPrice): void
    {
        $this->oldPrice = $oldPrice;
    }

    public function getRatingSum()
    {
        return $this->ratingSum;
    }

    public function setRatingSum($ratingSum): void
    {
        $this->ratingSum = $ratingSum;
    }

    public function getRatings()
    {
        return $this->ratings;
    }


    public function setRatings($ratings): void
    {
        $this->ratings = $ratings;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock): void
    {
        $this->stock = $stock;
    }

    public function getImagesCount()
    {
        return $this->imagesCount;
    }

    public function setImagesCount($imagesCount): void
    {
        $this->imagesCount = $imagesCount;
    }


    public function getHidden()
    {
        return $this->hidden;
    }

    public function setHidden($hidden): void
    {
        $this->hidden = $hidden;
    }

}
