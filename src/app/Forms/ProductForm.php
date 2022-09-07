<?php

namespace App\Forms;

use App\Model\Entity\Product;
use App\Model\Repository\ProductRepository;
use Nette\Application\AbortException;
use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;
use Doctrine\ORM\OptimisticLockException;
use Exception;

class ProductForm
{

    /** @var ?Product $product */
    protected ?Product $product;

    /** @var Presenter $presenter */
    protected Presenter $presenter;

    /** @var Form */
    protected Form $form;

    /** @var ProductRepository $productRepository */
    private ProductRepository $productRepository;

    public function __construct(
        $presenter,
        $product,
        $productRepository

    ) {
        $this->presenter = $presenter;
        $this->product = $product;
        $this->productRepository = $productRepository;

    }

    /**
     * @return void
     * @throws AbortException
     */
    public function cancel(): void
    {
        if ($this->product) {
            $this->presenter->redirect('default', $this->product->getId());
        } else {
            $this->presenter->redirect('default');
        }
    }

    /**
     * Create form component.
     * @return Form
     */
    public function create(): Form
    {
        $form = new Form();

        $form->addText('price', 'Cena:')
            ->setValue(isset($this->product) ? $this->product->getPrice() : null)
            ->addRule($form::REQUIRED, 'Pole Cena je povinné pole')
            ->getControlPrototype()->addAttributes(['class' => 'form-control']);

        $form->addSubmit('submit', 'Potvrdiť')
            ->getControlPrototype()->addAttributes(['class' => 'btn btn-primary']);

        $form->addSubmit('cancel', 'Zrušiť')
            ->setValidationScope([$form['submit']])
            ->onClick[] = [$this, 'cancel'];

        $form->onSuccess[] = isset($this->product) ? [$this, 'updateProduct'] : [$this, 'createProduct'];

        return $form;
    }

}
