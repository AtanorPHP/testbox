<?php
declare(strict_types = 1);
namespace  Atanor\TestBox\Test;

trait TreeTestTrait
{
    /**
     * @var array
     */
    protected $childTests = [];

    /**
     * Get Child tests
     * @return mixed
     */
    public function getChildTests():array
    {
        return $this->childTests;
    }

    /**
     * Add child test
     * @param Test $test
     * @return TreeTest
     */
    public function addChildTest(Test $test):TreeTest
    {
        $this->childTests[$test->getName()] = $test;
        return $this;
    }

    /**
     * @param string $name
     * @return Test
     */
    public function getChildTest(string $name):Test
    {
        return $this->childTests[$name];
    }

    /**
     * @param string $name
     * @return bool
     */
    public function hasChildTest(string $name):bool
    {
        return isset($this->childTests[$name]);
    }
}