<?php
namespace Nayjest\LaravelViewComponents\Data;

use Nayjest\ViewComponents\Data\Operations\OperationInterface;
use Nayjest\ViewComponents\Data\ProcessorResolverInterface;
use Nayjest\ViewComponents\Data\ProcessorResolvers\ProcessorResolver;
use Nayjest\ViewComponents\Data\Processors\ProcessorInterface;

class EloquentProcessorResolver extends ProcessorResolver
{
    public function __construct()
    {
        $ns = 'Nayjest\LaravelViewComponents\Data\Processors\Eloquent';
        $this->register(
            'Nayjest\ViewComponents\Data\Operations\Sorting',
            "$ns\\SortingProcessor"
        );
        $this->register(
            'Nayjest\ViewComponents\Data\Operations\Filter',
            "$ns\\FilterProcessor"
        );
    }
}
