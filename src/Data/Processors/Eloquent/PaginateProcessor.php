<?php

namespace Nayjest\LaravelViewComponents\Data\Processors\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Nayjest\ViewComponents\Data\Operations\OperationInterface;
use Nayjest\ViewComponents\Data\Operations\PaginateOperation;
use Nayjest\ViewComponents\Data\Processors\AbstractPaginateProcessor;

class PaginateProcessor extends AbstractPaginateProcessor
{
    /**
     * @param Builder $src
     * @param OperationInterface|PaginateOperation $operation
     * @return mixed
     */
    public function process($src, OperationInterface $operation)
    {

        $src->getQuery()
            ->limit($operation->getPageSize())
            ->offset($this->getOffset($operation));
        return $src;
    }
}
