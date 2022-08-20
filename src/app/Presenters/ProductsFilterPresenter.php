<?php

namespace App\Presenters;


use App\Model\Entity\Product;
use App\Model\Repository\ProductRepository;
use JetBrains\PhpStorm\NoReturn;
use Nette\Application\AbortException;
use Nette\Forms\Form;
use StdClass;
use Tracy\Debugger;
use Nette\Utils\Paginator;
use App\Forms\ProductsFilterForm;
use App\Forms\ProductForm;
use Nette\DI\Attributes\Inject;
use Nette\Application\Attributes\Persistent;
use Nette;


class ProductsFilterPresenter extends Nette\Application\UI\Presenter
{
    /**
     * @persistent
     */
    public $filterPriceFrom;

    /**
     * @persistent
     */
    public $filterPriceTo;


    /**
     * @var ProductRepository @inject
     */
    public ProductRepository $productRepository;

    /**
     * @var int $ItemsPerPage
     */
    private $itemsPerPage = 5;

    public function renderDefault(int $page = 1): void
    {
        $productsCount = count($this->productRepository->findProductsForGrid($this->getNewCriteria()));
        $this->template->productsCount = $productsCount;

        $paginator = new Paginator;
        $paginator->setItemCount($productsCount);
        $paginator->setItemsPerPage($this->itemsPerPage);
        $paginator->setPage($page);


        $products = $this->productRepository->findProductsForGrid(
            $this->getNewCriteria(),
            [],
            $paginator->getLength(),
            $paginator->getOffset()

        );

        $this->template->items = [];

        foreach ($products as $product) {
            $item = new StdClass();
            $item->id = $product->getId();
            $item->price = number_format($product->getPrice(), 0, "", " ");
            $item->title = $product->getTitle();
            $item->url = $product->getUrl();

        $this->template->items[] = $item;
        }
        $this->template->paginator = $paginator;
    }


    /**
     * @return array[]
     */
    private function getNewCriteria(): array
    {
        $criteria = [];
        $additionalCriteria = [];


        if ($this->filterPriceFrom != null) {
            $additionalCriteria['priceFrom'] = $this->filterPriceFrom;
        }

        if ($this->filterPriceTo != null) {
            $additionalCriteria['priceTo'] = $this->filterPriceTo;
        }

        return [$criteria, $additionalCriteria];
    }

    /**
     * @return Nette\Application\UI\Form
     */
    public function createComponentFilterForm(): \Nette\Application\UI\Form
    {
        $form = (new ProductsFilterForm(
            $this,
            $this->filterPriceFrom,
            $this->filterPriceTo
        )
        )->create();

        $form->addSubmit('cancel', 'Zrušiť')
            ->onClick[] = [$this, 'cancelFilter'];
        $form['cancel']->getControlPrototype()->addAttributes(['class' => 'btn btn-default']);
        $form->onSuccess[] = [$this, 'applyFilter'];

        return $form;
    }

    /**
     * @throws AbortException
     */
public function cancelFilter(): void
    {
        $this->filterPriceFrom = null;
        $this->filterPriceTo = null;

        $this->redirect('default');
    }

    /**
     * @return Nette\Application\UI\Form
     */
    protected function createComponentCreateForm(): \Nette\Application\UI\Form
    {
        return (new ProductForm(
            $this, null, $this->productRepository

        ))->create();
    }

    /**
     * @throws AbortException
     */
    public function applyFilter(Nette\Application\UI\Form $form): void
    {
        $values = $form->getValues();

        $this->filterPriceFrom = $values->priceFrom;
        $this->filterPriceTo = $values->priceTo;
        $this->redirect('default');
    }

}

