<?php
declare(strict_types = 1);
namespace Atanor\TestBox\SetPoint;

use Atanor\TestBox\Test\Result\Result;

class SetPointCollection extends AbstractSetPoint implements \IteratorAggregate
{
    /**
     * @var array
     */
    protected $setPoints = [];

    /**
     * @inheritDoc
     */
    public function check(Result &$result):SetPoint
    {
        foreach($this->setPoints as $setPoint) {
            $setPoint->check($result);
        }
        return $this;
    }

    /**
     * Add expectation
     * @param SetPoint $expectation
     * @return SetPointCollection
     */
    public function addToSetPoints(SetPoint $setPoint):SetPointCollection
    {
        $this->setPoints[$setPoint->getName()] = $setPoint;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->setPoints);
    }

    /**
     * @inheritDoc
     */
    public function setExpectedValue($value):SetPoint
    {
        var_dump($value);
        if ( ! is_array($value)) {
            //throw Api exception
        }
        foreach($this->setPoints as $setPointName => $setPoint) {
            if ( ! isset($value[$setPointName])) continue;
            $setPoint->setExpectedValue($value[$setPointName]);
        }
        return $this;
    }


}