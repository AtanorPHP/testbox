<?php
declare(strict_types = 1);
namespace Atanor\TestBox\Probe;

use Atanor\Events\Event\AbstractNotification;
use Atanor\TestBox\Test\Result\Result;

class ProbeNotification extends AbstractNotification
{
    /**
     * @var Result
     */
    protected $result;

    /**
     * @return Result
     */
    public function &getResult()
    {
        return $this->result;
    }

    /**
     * @param Result $result
     */
    public function setResult(Result &$result):ProbeNotification
    {
        $this->result = $result;
        return $this;
    }


}