<?php
declare(strict_types = 1);
namespace Atanor\TestBox\Application;

use Atanor\Di\Container\DefaultContainer;
use Atanor\Di\Container\ServiceLocator\ServiceGhost;
use Atanor\Di\Graph\Ghost\DefaultGhost;
use Atanor\Di\Graph\Ghost\DefaultGraphedGhost;
use Atanor\TestBox\Box\MethodBox;
use Atanor\TestBox\Parameter\DefaultParameterCollection;
use Atanor\TestBox\Parameter\SimpleParameter;
use Atanor\TestBox\Test\Configuration;
use Atanor\TestBox\Test\Result\DefaultResult;
use Atanor\TestBox\Test\Test;
use Atanor\TestBox\Test\TestGhost;

class Application
{
    /**
     * @var DefaultContainer
     */
    protected $container;

    /**
     * Application constructor.
     */
    public function __construct()
    {
        $this->container = new DefaultContainer();
    }

    /**
     * @param array $config
     * @return Application
     */
    public function setUpTest(array $config):Application
    {
        $testGhost = TestGhost::build($config);
        $this->container->addItem($testGhost,'test');
        return $this;
    }

    /**
     *
     */
    public function runTest()
    {
        $test = $this->container->get('test');
        $result =$test->run(new DefaultResult());
        var_dump($test);
        var_dump($result);
    }



}