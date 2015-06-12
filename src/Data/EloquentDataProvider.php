<?php

namespace Nayjest\LaravelViewComponents\Data;

use App;
use Illuminate\Database\Eloquent\Builder;
use Nayjest\ViewComponents\Data\AbstractDataProvider;
use Nayjest\ViewComponents\Data\Operations\OperationInterface;

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
            '\Nayjest\LaravelViewComponents\Data\EloquentProcessingService',
            [
                App::make('Nayjest\LaravelViewComponents\Data\EloquentProcessorResolver'),
                $this->operations(),
                $src
            ]
        );
    }
}
