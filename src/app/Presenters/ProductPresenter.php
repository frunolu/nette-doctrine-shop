<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Model\Repository\ProductRepository;
use Nette;
use Tracy\Debugger;

class ProductPresenter extends Nette\Application\UI\Presenter
{

    /**
     * @var ProductRepository @inject
     */
    public ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        parent::__construct();
        $this->productRepository = $productRepository;
    }

    public function renderDetail($url)
    {
        $product = $this->productRepository->findProductByUrl($url);
        $this->template->products = $product;
    }

    public function renderDefault(int $page = 1): void
    {
        $this->template->allProducts = $this->productRepository->findAll();
    }

}
