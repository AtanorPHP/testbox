<?php
declare(strict_types = 1);
namespace Atanor\TestBox\Test;

interface TreeTest extends Test
{
    /**
     * Get Child tests
     * @return mixed
     */
    public function getChildTests():array;

    /**
     * Add child test
     * @param Test $test
     * @return TreeTest
     */
    public function addChildTest(Test $test):TreeTest;

    /**
     * @param string $name
     * @return bool
     */
    public function hasChildTest(string $name):bool;

    /**
     * @param string $name
     * @return test
     */
    public function getChildTest(string $name):test;
}