<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Model\Repository\CategoryRepository;
use Nette;

class CategoryPresenter extends Nette\Application\UI\Presenter
{

    /**
     * @var CategoryRepository @inject
     */
    public CategoryRepository $categoryRepository;


    /**
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     * @throws \Doctrine\ORM\ORMException
     */
    public function renderShow($url)
    {
        $category = $this->categoryRepository->findCategoryByUrl($url);
        $this->template->cat = $category;
        $this->template->productsOfCategory = $this->categoryRepository->findProductsOfCategoryByCategoryId($category->getId());
    }

}
