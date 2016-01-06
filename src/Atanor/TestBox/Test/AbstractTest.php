<?php
declare(strict_types = 1);
namespace Atanor\TestBox\Test;

use Atanor\Events\Subject\SubjectTrait;
use Atanor\TestBox\Generator\Generator;
use Atanor\TestBox\Probe\Probe;
use Atanor\TestBox\SetPoint\SetPoint;
use Atanor\TestBox\SetPoint\SetPointCollection;
use Atanor\TestBox\Test\Environment\Environment;
use Atanor\TestBox\Box\Box;
use Atanor\TestBox\Test\Result\Result;

abstract class AbstractTest implements Test
{
    use SubjectTrait;

    /**
     * @var Environment
     */
    protected $environment;

    /**
     * Test box
     * @var Box
     */
    protected $box;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var SetPointCollection
     */
    protected $setPoints;

    /**
     * @var Generator
     */
    protected $generator;

    /**
     * @inheritDoc
     */
    public function setEnvironment(Environment &$environment):Box
    {
        $this->environment = $environment;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getInputParameters():array
    {
        return $this->generator->getInputParameters();
    }

    /**
     * @inheritDoc
     */
    public function getSetPointParameters():array
    {
        return $this->generator->getSetPointParameters();
    }

    /**
     * @inheritDoc
     */
    public function setBox(Box $box):Test
    {
        $this->box = $box;
        $this->box->setEnvironment($this->environment);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getBox():Box
    {
        return $this->box;
    }

    /**
     * @inheritDoc
     */
    public function getName():string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function setName(string $name):Test
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function run(Result &$result = null,array $input = null):Result
    {
        $result = $this->doRun($result,$input);
        $this->setPoints->setExpectedValue($this->getSetPointParameters());
        $this->setPoints->check($result);
        $this->generator->next();
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function attachProbe(Probe $probe):Box
    {
        $this->box->attachProbe($probe);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addSetPoint(SetPoint $setPoint):Test
    {
        $this->setPoints->addToSetPoints($setPoint);
        return $this;
    }

    /**
     * @param Result|null                     $result
     * @param array $input
     * @return Result
     */
    abstract public function doRun(Result &$result = null,array $input = null):Result;
}