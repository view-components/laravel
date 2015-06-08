<?php

namespace Nayjest\LaravelViewComponents\Data;

use Illuminate\Database\Eloquent\Builder;
use Nayjest\ViewComponents\Data\AbstractProcessingManager;
use Traversable;

/**
 * Class DbTableProcessingManager
 *
 * @package Nayjest\ViewComponents\Data
 */
class EloquentProcessingManager extends AbstractProcessingManager
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
        return $data;
    }
}
