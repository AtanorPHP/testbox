<?php
declare(strict_types = 1);
namespace Atanor\TestBox\Test\Result;

use Atanor\TestBox\Probe\Probe;

class DefaultResult implements Result
{
    /**
     * Child result
     * @var array
     */
    protected $childResults = [];

    /**
     * @var bool
     */
    protected $isOk = false;

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @inheritDoc
     */
    public function setOutput($output):Result
    {
        $this->setData('output',$output);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getOutput()
    {
        return $this->getData('output');
    }

    /**
     * @inheritDoc
     */
    public function addChildResult(Result $result):Result
    {
        $this->childResults[] = $result;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setException(\Exception $exception):Result
    {
        $this->setData('exception',$exception);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getException():\Exception
    {
        return $this->getData('exception');
    }

    /**
     * @inheritDoc
     */
    public function isOk():Bool
    {
        return $this->isOk;
    }

    /**
     * @inheritDoc
     */
    public function setIsOk(bool $isOk):Result
    {
        $this->isOk = $isOk;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setData(string $name, $value):Result
    {
        $this->data[$name] = $value;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getData(string $name)
    {
        return $this->data[$name];
    }
}