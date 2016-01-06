<?php
declare(strict_types = 1);
namespace Atanor\TestBox\SetPoint;


abstract class AbstractSetPoint implements SetPoint
{
    /**
     * @var mixed
     */
    protected $expectedValue;

    /**
     * @var string
     */
    protected $monitoredData;

    /**
     * @var string
     */
    protected $name;

    /**
     * @inheritDoc
     */
    public function setMonitoredData(string $name):SetPoint
    {
        $this->monitoredData = $name;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getMonitoredData():string
    {
        return $this->monitoredData;
    }


    /**
     * @inheritDoc
     */
    public static function build(array $params):SetPoint
    {
        $setPoint = new static();
        $setPoint->setName($params['name']);
        return $setPoint;
    }

    /**
     * @inheritDoc
     */
    public function setExpectedValue($value):SetPoint
    {
        $this->expectedValue = $value;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getExpectedValue()
    {
        return $this->expectedValue;
    }

    /**
     * @inheritDoc
     */
    public function setName(string $name):SetPoint
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getName():string
    {
        return $this->name;
    }


}