<?php
declare(strict_types = 1);
namespace Atanor\TestBox\Generator;

class ArrayGenerator implements Generator
{
    protected $data = [
        'inputs' => [],
        'ExpectedValues' => [],
    ];

    /**
     * @var int
     */
    protected $index = 0;

    /**
     * @inheritDoc
     */
    public function getInputParameters():array
    {
        return $this->data['inputs'][$this->index];
    }

    /**
     * @inheritDoc
     */
    public function getSetPointParameters():array
    {
        return $this->data['ExpectedValues'][$this->index];
    }

    /**
     * @inheritDoc
     */
    public function next():Generator
    {
        $this->index++;
        return $this;
    }


}