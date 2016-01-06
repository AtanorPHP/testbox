<?php
declare(strict_types = 1);
namespace Atanor\TestBox\Generator;


interface Generator
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
     * @return Generator
     */
    public function next():Generator;
}