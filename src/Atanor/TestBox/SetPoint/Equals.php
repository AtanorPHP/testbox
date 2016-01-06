<?php
declare(strict_types = 1);
namespace Atanor\TestBox\SetPoint;

use Atanor\TestBox\Parameter\ParameterCollection;
use Atanor\TestBox\Test\Result\Result;

class Equals extends AbstractSetPoint
{
    /**
     * @inheritDoc
     */
    public function check(Result &$result):SetPoint
    {
        $data = $result->getData($this->getMonitoredData());
        if ($data === $this->getExpectedValue()) $result->setIsOk(true);
        return $this;
    }
}