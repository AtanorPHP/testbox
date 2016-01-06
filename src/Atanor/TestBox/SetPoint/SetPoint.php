<?php
declare(strict_types = 1);
namespace  Atanor\TestBox\SetPoint;

use Atanor\TestBox\Test\Result\Result;

interface SetPoint
{
    /**
     * Check if result match setPoint.
     * If not, Result will be in ko state
     * @param Result $result
     * @return SetPoint
     */
    public function check(Result &$result):SetPoint;

    /**
     * @param $value
     * @return SetPoint
     */
    public function setExpectedValue($value):SetPoint;

    /**
     * @return mixed
     */
    public function getExpectedValue();

    /**
     * @param string $name
     * @return SetPoint
     */
    public function setMonitoredData(string $name):SetPoint;

    /**
     * @return string
     */
    public function getMonitoredData():string;

    /**
     * @param string $name
     * @return SetPoint
     */
    public function setName(string $name):SetPoint;

    /**
     * @return string
     */
    public function getName():string;

    /**
     * @param array $params
     * @return SetPoint
     */
    public static function build(array $params):SetPoint;



}