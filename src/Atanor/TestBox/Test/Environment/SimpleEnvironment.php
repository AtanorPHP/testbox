<?php
declare(strict_types = 1);
namespace Atanor\TestBox\Test\Environment;

class SimpleEnvironment implements Environment
{
    /**
     * Variables
     * @var array
     */
    protected $variables = [];

    /**
     * @inheritDoc
     */
    public function setVariable($name, $value):Environment
    {
        $this->variables[$name] = $value;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getVariable($name)
    {
        return $this->variables[$name];
    }


}