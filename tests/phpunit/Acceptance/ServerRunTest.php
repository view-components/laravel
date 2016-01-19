<?php
namespace Presentation\Laravel\Test\Acceptance;

use PHPUnit_Framework_TestCase;
use Presentation\Laravel\Demo\Controller;

class ServerRunTest extends AbstractTest
{
    public function testPages()
    {
        $this->assertPagesWorks(get_class_methods(Controller::class));
    }

    public function testIndex()
    {
        $this->assertPageContains('Laravel Integration', '/');
    }
}