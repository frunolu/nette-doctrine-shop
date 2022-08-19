<?php

declare(strict_types=1);

namespace App\Router;

use Nette;
use Nette\Application\Routers\RouteList;
use Nette\StaticClass;


final class RouterFactory
{
    use StaticClass;

    public static function createRouter(): RouteList
    {
        $router = new RouteList;
        $router->addRoute('Produkty/', 'Products:default');
        $router->addRoute('Filtrovani/', 'ProductsFilter:default');
        $router->addRoute('Clanky/', 'Article:default');
        $router->addRoute('prihlaseni/', 'Sign:in');
        $router->addRoute('<url>', 'Category:show');
        $router->addRoute('<presenter>/<url>', 'Product:detail');
        $router->addRoute('<presenter>/<action>[/<url>]', 'Homepage:default');
        return $router;
    }
}
