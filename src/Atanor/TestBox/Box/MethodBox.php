<?php
declare(strict_types = 1);
namespace Atanor\TestBox\Box;

use Atanor\TestBox\Probe\ExecutionTimeProbe;
use Atanor\TestBox\Probe\ProbeNotification;
use Atanor\TestBox\Test\Result\Result;

class MethodBox extends AbstractBox
{
    /**
     * @var string
     */
    protected $method;

    /**
     * @var mixed
     */
    protected $instance;

    /**
     * @inheritDoc
     */
    protected function doRun(Result &$result = null,array $inputs = null):Result
    {
        $class = get_class($this->instance);
        $reflectionClass = new \ReflectionClass($class);
        $reflectionMethod = $reflectionClass->getMethod($this->method);
        $minimalParametersCount = $reflectionMethod->getNumberOfRequiredParameters();
        if (count($inputs) < $minimalParametersCount) {
            //@todo throw exception
        }
        try {
            $methodRunNotification = new ProbeNotification();
            $methodRunNotification->setEventName(ExecutionTimeProbe::EVENT_START_TIME);
            $methodRunNotification->setResult($result);
            $this->trigger($methodRunNotification);
            $output =  $reflectionMethod->invokeArgs($this->instance,$inputs);
            $methodRunNotification->setEventName(ExecutionTimeProbe::EVENT_END_TIME);
            $this->trigger($methodRunNotification);
            $result->setOutput($output);
        } catch (\Exception $e) {
            $result->setException($e);
        }
        return $result;
    }

    /**
     * @param mixed $instance
     */
    public function setInstance($instance):MethodBox
    {
        $this->instance = $instance;
        return $this;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method):MethodBox
    {
        $this->method = $method;
        return $this;
    }
}