<?php
declare(strict_types = 1);
namespace  Atanor\TestBox\Probe;

use Atanor\TestBox\Box\Box;

class ExecutionTimeProbe implements Probe
{
    const EVENT_START_TIME = 'ExecutionTimeProbe::startTime';
    const EVENT_END_TIME = 'ExecutionTimeProbe::endTime';

    /**
     * @var int
     */
    protected $startTime;

    /**
     * @inheritDoc
     */
    public function attach(Box $box):Probe
    {
        $box->attachObserver([$this, 'onPreRun'],static::EVENT_START_TIME);
        $box->attachObserver([$this, 'onPostRun'],static::EVENT_END_TIME);
        return $this;
    }

    public function onPreRun(ProbeNotification $notification):ExecutionTimeProbe
    {
        $this->startTime = microtime(true);
        return $this;
    }

    public function onPostRun(ProbeNotification $notification):ExecutionTimeProbe
    {
        $endTime = microtime(true);
        $executionTime = ($endTime - $this->startTime)*1000;
        $result = $notification->getResult();
        $result->setData('execTime',$executionTime);
        return $this;
    }


}