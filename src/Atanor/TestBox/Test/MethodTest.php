<?php
declare(strict_types = 1);
namespace  Atanor\TestBox\Test;

use Atanor\TestBox\Test\Result\Result;

class MethodTest extends AbstractTest
{
    /**
     * @var mixed
     */
    protected $sample;

    /**
     * @var
     */
    protected $testedMethod;

    /**
     * @inheritDoc
     */
    public function doRun(Result &$result = null, array $input = null):Result
    {
        if ( $input === null) $input = $this->getInputParameters();
        $this->box->setInstance($this->sample);
        $this->box->setMethod($this->testedMethod);
        if ( ! $input) {
            $input = $this->getInputParameters();
        }
        $this->box->run($result,$input);
        return $result;
    }

    /**
     * @param string $sample
     */
    public function setSample($sample):MethodTest
    {
        $this->sample = $sample;
        return $this;
    }

    /**
     * @param mixed $testedMethod
     */
    public function setTestedMethod(string $testedMethod):MethodTest
    {
        $this->testedMethod = $testedMethod;
        return $this;
    }
}