<?php
namespace Presentation\Laravel\Test\Acceptance;

use Exception;
use GuzzleHttp\Client;
use PHPUnit_Framework_TestCase;

abstract class AbstractTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Client
     */
    protected $client;
    protected $baseUri = 'http://localhost:8000';
    protected $connectionChecked = false;
    protected $process;
    public function setUp()
    {
        $this->client = new Client([
            'base_uri' => $this->baseUri,
        ]);


        $this->checkConnection();
    }

    protected function startServer()
    {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            echo "\r\n===[ Starting WEB-SERVER... ]===\r\n";
            $this->process = popen("start php -S localhost:8000 tests/webapp/index.php", "r");
        } else {
            echo "\r\n===[ Can't start WEB-SERVER, disabled for unix ]===\r\n";
            $this->process = false;
        }
    }

    public function tearDown()
    {
        if ($this->process) {
            pclose($this->process);
        }
    }

    protected function checkConnection()
    {
        if ($this->connectionChecked) {
            return;
        }
        $this->connectionChecked = true;
        try {
            if ($this->client->get('/')->getStatusCode() !== 200) {
                throw new Exception();
            }
        } catch(Exception $e) {
            if ($this->process === null) {
                $this->startServer();
                if ($this->process !== null) {
                    $this->checkConnection();
                    return;
                }
            }
            $this->markTestSkipped("Can't find working server at $this->baseUri");
        }
    }

    protected function get($uri, $options = [])
    {
        return $this->client->get($uri, $options)->getBody()->getContents();
    }

    protected function assertPageContains($expected, $uri, $options = [])
    {
        self::assertContains($expected, $this->get($uri, $options));
    }

    protected function assertPageWorks($uri, $options = [])
    {
        self::assertTrue($this->client->get($uri, $options)->getStatusCode() == 200);
    }

    protected function assertPagesWorks(array $uris)
    {
        foreach($uris as $uri) {
            $this->assertPageWorks($uri);
        }
    }
}