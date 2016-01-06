<?php
declare(strict_types = 1);
namespace Atanor\TestBox\Box;

use Atanor\Events\Subject\Subject;
use Atanor\TestBox\Test\Environment\Environment;
use Atanor\TestBox\Test\Result\Result;
use Atanor\TestBox\Probe\Probe;

interface Box extends Subject
{
    /**
     * Set environment
     * @param Environment $environment
     * @return Box
     */
    public function setEnvironment(Environment &$environment):Box;

    /**
     * Run box code with given inputs
     * @return mixed
     */
    public function run(Result &$result = null,array $input = null):Result;

    /**
     * @param Probe $probe
     * @return Box
     */
    public function attachProbe(Probe $probe):Box;
}
