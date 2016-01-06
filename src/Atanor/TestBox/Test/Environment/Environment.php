<?php
declare(strict_types = 1);
namespace  Atanor\TestBox\Test\Environment;

interface Environment
{
    /**
     * Set global variable
     * @param $name
     * @param $value
     * @return Environment
     */
    //public function setGlobal($name,$value):Environment;

    /**
     * Set variable
     * @param $name
     * @param $value
     * @return Environment
     */
    public function setVariable($name,$value):Environment;

    /**
     * Returns variable
     * @param $name
     * @return mixed
     */
    public function getVariable($name);

}