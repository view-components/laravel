<?php

namespace Nayjest\LaravelViewComponents\Data\Processors\Eloquent;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder;
use Nayjest\ViewComponents\Data\Operations\OperationInterface;
use Nayjest\ViewComponents\Data\Operations\SortOperation;
use Nayjest\ViewComponents\Data\Processors\ProcessorInterface;

class SortProcessor implements ProcessorInterface
{
    /**
     * @param Builder|EloquentBuilder $src
     * @param OperationInterface|SortOperation $operation
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
