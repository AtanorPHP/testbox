<?php
declare(strict_types = 1);
namespace Atanor\TestBox\Test;

use Atanor\TestBox\Box\Box;
use Atanor\TestBox\SetPoint\SetPoint;

interface Test extends Box
{
    /**
     * @return array
     */
    public function getInputParameters():array;

    /**
     * @return array
     */
    public function getSetPointParameters():array;

    /**
     * Set box
     * @param Box $box
     * @return Test
     */
    public function setBox(Box $box):Test;

    /**
     * Return box
     * @return Box
     */
    public function getBox():Box;

    /**
     * Box name
     * @return string
     */
    public function getName():string;

    /**
     * @param string $name
     * @return Test
     */
    public function setName(string $name):Test;

    /**
     * @param SetPoint $setPoint
     * @return Test
     */
    public function addSetPoint(SetPoint $setPoint):Test;
}