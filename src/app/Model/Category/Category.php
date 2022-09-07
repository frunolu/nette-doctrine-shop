<?php

namespace App\Model\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Annotation;

/**
 * Class Category
 *
 * @ORM\Entity(repositoryClass="App\Model\Repository\CategoryRepository")
 * @ORM\Table(name="category")
 * @package App\Model\Entity
 */
class Category
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
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $orderNo;

    /**
     * @ORM\Column(type="smallint")
     */
    private $hidden;


//     * @var Category
//     * @ORM\ManyToOne(targetEntity=Category::class)
//     * @ORM\JoinColumn(referencedColumnName="id", name="parent_category_id")
//     */
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $parentCategory;

//    /**
//     * @ORM\Category[]
//     *
//     */
//    private $children;
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
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getOrderNo()
    {
        return $this->orderNo;
    }

    /**
     * @param mixed $orderNo
     */
    public function setOrderNo($orderNo): void
    {
        $this->orderNo = $orderNo;
    }

    /**
     * @return mixed
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * @param mixed $hidden
     */
    public function setHidden($hidden): void
    {
        $this->hidden = $hidden;
    }

    /**
     * @return mixed
     */
    public function getParentCategory()
    {
        return $this->parentCategory;
    }

    /**
     * @param mixed $parentCategory
     */
    public function setParentCategory($parentCategory): void
    {
        $this->parentCategory = $parentCategory;
    }


}
