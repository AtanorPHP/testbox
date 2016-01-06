<?php
declare(strict_types = 1);
namespace Atanor\TestBox\Box;

use Atanor\Events\Subject\SubjectTrait;
use Atanor\TestBox\Test\Environment\Environment;
use Atanor\TestBox\Probe\Probe;
use Atanor\TestBox\Test\Result\Result;
use Atanor\TestBox\Probe\ProbeNotification;

abstract class AbstractBox implements Box
{
    const EVENT_PRE_RUN = 'preRun';
    const EVENT_POST_RUN = 'postRun';

    use SubjectTrait;

    /**
     * Environment
     * @var Environment
     */
    protected $environment;

    /**
     * @inheritDoc
     */
    public function setEnvironment(Environment &$environment):Box
    {
        $this->environment = $environment;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function attachProbe(Probe $probe):Box
    {
        $probe->attach($this);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function run(Result &$result = null,array $input = null):Result
    {
        $preRunNotification = new ProbeNotification();
        $preRunNotification->setEventName(static::EVENT_PRE_RUN);
        $preRunNotification->setResult($result);
        $this->trigger($preRunNotification);
        $result = $this->doRun($result,$input);
        $postRunNotification = clone $preRunNotification;
        $postRunNotification->setEventName(static::EVENT_POST_RUN);
        $this->trigger($postRunNotification);
        return $result;
    }

    /**
     * @param Result|null                     $result
     * @param array|null $input
     * @return Result
     */
    abstract protected function doRun(Result &$result = null,array $input = null):Result;

}