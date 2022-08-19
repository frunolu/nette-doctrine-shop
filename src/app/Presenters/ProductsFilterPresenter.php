<?php

namespace App\Presenters;

use App\Model\Repository\ProductRepository;
use Tracy\Debugger;
use Nette\Utils\Paginator;
use Nette;

class ProductsFilterPresenter extends Nette\Application\UI\Presenter
{
    /**
     * @var ProductRepository @inject
     */
    public ProductRepository $productRepository;

    /**
     * @var int $ItemsPerPage
     */
    private $itemsPerPage = 10;

    public function renderDefault(int $page = 1): void
    {
        $productsCount = count($this->productRepository->findAll());
        $this->template->productsCount = $productsCount;

        $paginator = new Paginator;
        $paginator->setItemCount($productsCount);
        $paginator->setItemsPerPage($this->itemsPerPage);
        $paginator->setPage($page);

        $products = $this->productRepository->findBy
        (
            [],
            null,
            $paginator->getLength(),
            $paginator->getOffset()
        );

        $this->template->products = $products;
        $this->template->paginator = $paginator;
    }
    /**
     * @return array[]
     */
    private function getNewCriteria(): array
    {

}

