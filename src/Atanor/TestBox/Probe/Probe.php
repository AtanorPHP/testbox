<?php
declare(strict_types = 1);
namespace Atanor\TestBox\Probe;

use Atanor\TestBox\Box\Box;

interface Probe
{
    /**
     * Attach itself to a box
     * @param Box $box
     * @return Probe
     */
    public function attach(Box $box):Probe;
}