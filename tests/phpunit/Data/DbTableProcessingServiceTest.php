<?php

namespace Presentation\Laravel\Test\Data;

use Presentation\Framework\Data\OperationsCollection;
use Presentation\Framework\Test\Data\AbstractProcessingServiceTest;
use Presentation\Laravel\Data\EloquentProcessingService;
use Presentation\Laravel\Data\EloquentProcessorResolver;
use Presentation\Laravel\Demo\Model\User;

require __DIR__ .'/../../../vendor/presentation/framework/tests/phpunit/Data/AbstractProcessingServiceTest.php';

class DbTableProcessingServiceTest extends AbstractProcessingServiceTest
{
    public function setUp()
    {
        $this->data = (new User())->newQuery();
        $this->operations = new OperationsCollection();
        $this->service = new EloquentProcessingService(
            new EloquentProcessorResolver(),
            $this->operations,
            $this->data
        );
        $this->totalCount =  (new User())->newQuery()->get()->count();
    }
}