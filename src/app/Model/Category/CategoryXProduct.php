<?php

namespace App\Model\Entity;

use App\Model\Entity\Category;
use App\Model\Entity\Product;
use Doctrine\ORM\Mapping as ORM;
use App\Model\Repository\CategoryXProductRepository;

/**
 * Class CategoryXProduct
 *
 * @ORM\Entity(repositoryClass="App\Model\Repository\CategoryXProductRepository")
 * @ORM\Table(name="category_x_product")
 * @package App\Model\Entity
 */
class CategoryXProduct
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
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
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity=Category::class)
     * @ORM\JoinColumn(referencedColumnName="id", name="category_id")
     */
    private $category;

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
     * @return \App\Model\Entity\Product
     */
    public function getProduct(): \App\Model\Entity\Product
    {
        return $this->product;
    }

    /**
     * @param \App\Model\Entity\Product $product
     */
    public function setProduct(\App\Model\Entity\Product $product): void
    {
        $this->product = $product;
    }

    /**
     * @return \App\Model\Entity\Category
     */
    public function getCategory(): \App\Model\Entity\Category
    {
        return $this->category;
    }

    /**
     * @param \App\Model\Entity\Category $category
     */
    public function setCategory(\App\Model\Entity\Category $category): void
    {
        $this->category = $category;
    }



}
