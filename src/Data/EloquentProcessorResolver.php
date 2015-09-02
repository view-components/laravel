<?php

namespace Presentation\Larvel\Data;

use Presentation\Framework\Data\Operation\FilterOperation;
use Presentation\Framework\Data\Operation\PaginateOperation;
use Presentation\Framework\Data\Operation\SortOperation;
use Presentation\Framework\Data\ProcessorResolver\ProcessorResolver;
use Presentation\Larvel\Data\Processor\Eloquent\FilterProcessor;
use Presentation\Larvel\Data\Processor\Eloquent\PaginateProcessor;
use Presentation\Larvel\Data\Processor\Eloquent\SortProcessor;

class EloquentProcessorResolver extends ProcessorResolver
{
    public function __construct()
    {
        $this
            ->register(SortOperation::class,        SortProcessor::class)
            ->register(FilterOperation::class,      FilterProcessor::class)
            ->register(PaginateOperation::class,    PaginateProcessor::class)
        ;
    }
}
