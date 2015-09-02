<?php

namespace Presentation\Larvel\Data\Processor\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Presentation\Framework\Data\Operation\OperationInterface;
use Presentation\Framework\Data\Operation\SortOperation;
use Presentation\Framework\Data\Processor\ProcessorInterface;

class SortProcessor implements ProcessorInterface
{
    /**
     * @param Builder $src
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
