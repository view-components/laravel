<?php

namespace Nayjest\LaravelViewComponents\Data\Processors\Eloquent;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder;
use Nayjest\ViewComponents\Data\Operations\OperationInterface;
use Nayjest\ViewComponents\Data\Operations\Sorting;
use Nayjest\ViewComponents\Data\Processors\ProcessorInterface;

class SortingProcessor implements ProcessorInterface
{
    /**
     * @param Builder|EloquentBuilder $src
     * @param OperationInterface|Sorting $operation
     * @return mixed
     */
    public function process($src, OperationInterface $operation)
    {
        $field = $operation->getField();
        $order = $operation->getOrder();
        $src->orderBy($field, $order);
        return $src;
    }
}
