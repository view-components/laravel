<?php

namespace Nayjest\LaravelViewComponents\Data\Processors\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Nayjest\ViewComponents\Data\Operations\Filter;
use Nayjest\ViewComponents\Data\Operations\OperationInterface;
use Nayjest\ViewComponents\Data\Processors\ProcessorInterface;

class FilterProcessor implements ProcessorInterface
{
    /**
     * @param Builder $src
     * @param OperationInterface|Filter $operation
     * @return mixed
     */
    public function process($src, OperationInterface $operation)
    {
        $value = $operation->getValue();
        $operator = $operation->getOperator();
        $field = $operation->getField();
        $src->where($field, $operator, $value);
        return $src;
    }
}
