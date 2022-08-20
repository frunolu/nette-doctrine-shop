<?php

namespace App\Forms;

use App\Model\Repository\ProductRepository;
use Nette\Application\UI\Form;


class ProductsFilterForm
{

    private $presenter;

    /** @var $priceFrom */
    private $priceFrom;

    /** @var $priceTo */
    private $priceTo;


    public function __construct(
        $presenter,
        $priceFrom,
        $priceTo
    )
    {

        $this->presenter = $presenter;
        $this->priceFrom = $priceFrom;
        $this->priceTo = $priceTo;
    }

    public function create(): Form
    {
        $form = new Form();

        $form->addText('priceFrom', 'Cena (€) od')
            ->setValue($this->priceFrom ?? null)
            ->getControlPrototype()->addAttributes(['class' => 'form-control']);

        $form->addText('priceTo', 'Cena (€) do')
            ->setValue(null ?? $this->priceTo)
            ->getControlPrototype()->addAttributes(['class' => 'form-control']);

        $form->addSubmit('submit', 'Filtrovať')
            ->getControlPrototype()->addAttributes(['class' => 'btn btn-primary']);

        return $form;
    }

}
