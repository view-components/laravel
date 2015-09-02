<?php

namespace Presentation\Larvel\Data;

use App;
use Illuminate\Database\Eloquent\Builder;
use Presentation\Framework\Data\AbstractDataProvider;
use Presentation\Framework\Data\Operation\OperationInterface;

class EloquentDataProvider extends AbstractDataProvider
{
    /**
     *
     * @param Builder $src
     * @param OperationInterface[] $operations
     */
    public function __construct(Builder $src, array $operations = [])
    {
        $this->operations()->set($operations);
        $this->processingService = App::make(
            EloquentProcessingService::class,
            [
                App::make(EloquentProcessorResolver::class),
                $this->operations(),
                $src
            ]
        );
    }
}
