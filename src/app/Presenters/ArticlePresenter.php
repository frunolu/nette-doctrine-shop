<?php

namespace App\Presenters;

use App\Model\Entity\Article;
use App\Model\Repository\ArticleRepository;
use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;
use Nette\InvalidArgumentException;
use Tracy\Debugger;

/**
 * Presenter pro články.
 * @package App\Presenters
 */
class ArticlePresenter extends Presenter
{
    /**
     * @var ArticleRepository $articleRepository
     */
    private ArticleRepository $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        parent::__construct();

        $this->articleRepository = $articleRepository;
    }


    public function renderdefault():void
    {
        $articles = $this->articleRepository->findAll();
        $this->template->articles = $articles;

    }

}
