<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Model\Repository\CategoryRepository;
use Nette;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{

    /**
     * @var CategoryRepository @inject
     */
    public CategoryRepository $categoryRepository;

    public function renderDefault(): void
    {
        $this->template->categories = $this->categoryRepository->findAll();
    }
}
