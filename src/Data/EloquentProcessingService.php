<?php

namespace Presentation\Laravel\Data;

use Illuminate\Database\Eloquent\Builder;
use Presentation\Framework\Data\ProcessingService\AbstractProcessingService;
use Traversable;

/**
 * Class DbTableProcessingManager
 *
 * @package Nayjest\ViewComponents\Data
 */
class EloquentProcessingService extends AbstractProcessingService
{
    /**
     * @param Builder $data
     * @return Traversable
     */
    protected function afterOperations($data)
    {
        return $data->get();
    }

    /**
     * @param Builder $data
     * @return Builder
     */
    protected function beforeOperations($data)
    {
        return clone $data;
    }

    /**
     * @return int
     */
    public function count()
    {
        return $this->applyOperations(
            $this->beforeOperations($this->dataSource)
        )->count();
    }
}
