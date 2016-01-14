<?php

namespace Presentation\Laravel\Data;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder;
use Presentation\Framework\Data\AbstractDataProvider;
use Presentation\Framework\Data\Operation\OperationInterface;

class EloquentDataProvider extends AbstractDataProvider
{
    /**
     *
     * @param Builder|EloquentBuilder $src
     * @param OperationInterface[] $operations
     */
    public function __construct($src, array $operations = [])
    {
        $this->operations()->set($operations);
        $this->processingService = new EloquentProcessingService(
            new EloquentProcessorResolver(),
            $this->operations(),
            $src
        );
    }
}
