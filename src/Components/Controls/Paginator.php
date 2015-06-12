<?php

namespace Nayjest\LaravelViewComponents\Components\Controls;

use Illuminate\Pagination\LengthAwarePaginator;
use Nayjest\ViewComponents\BaseComponents\ComponentInterface;
use Nayjest\ViewComponents\BaseComponents\ComponentTrait;
use Nayjest\ViewComponents\BaseComponents\Controls\ControlInterface;

use Nayjest\ViewComponents\BaseComponents\Controls\Paginator\PaginatorTrait;

class Paginator implements ComponentInterface, ControlInterface
{
    use PaginatorTrait;
    use ComponentTrait;

    protected function makeLaravelPaginator()
    {
        return new LengthAwarePaginator(
            $this->paginateHandler->getDataProvider(),
            $this->getTotalCount(),
            $this->getPageSize(),
            $this->getCurrentPage(),
            [
                'path' => LengthAwarePaginator::resolveCurrentPath()
            ]
        );
    }

    public function render()
    {
        return $this->makeLaravelPaginator()->render();
    }
}
