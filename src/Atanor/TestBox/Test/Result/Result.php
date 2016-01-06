<?php
declare(strict_types = 1);
namespace Atanor\TestBox\Test\Result;

use Atanor\TestBox\Probe\Probe;

interface Result
{
    /**
     * Add box output
     * @param $output
     * @return Result
     */
    public function setOutput($output):Result;

    /**
     * Return output
     * @returns mixed
     */
    public function getOutput();

    /**
     * Set exception
     * @param \Exception $exception
     * @return Result
     */
    public function setException(\Exception $exception):Result;

    /**
     * Return exception
     * @return \Exception
     */
    public function getException():\Exception;

    /**
     * Add child result
     * @param Result $result
     * @return Result
     */
    public function addChildResult(Result $result):Result;

    /**
     * Return true is result is ok
     * @return Bool
     */
    public function isOk():Bool;

    /**
     * Set whether result is ok or not
     * @param bool $isOk
     * @return Result
     */
    public function setIsOk(bool $isOk):Result;

    /**
     * @param       $string
     * @return mixed
     */
    public function setData(string $name,$value):Result;

    /**
     * @param string $name
     * @return mixed
     */
    public function getData(string $name);
}