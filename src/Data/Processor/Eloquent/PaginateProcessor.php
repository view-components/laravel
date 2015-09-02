<?php

namespace Presentation\Larvel\Data\Processor\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Presentation\Framework\Data\Operation\OperationInterface;
use Presentation\Framework\Data\Operation\PaginateOperation;
use Presentation\Framework\Data\Processor\AbstractPaginateProcessor;

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
