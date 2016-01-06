<?php
declare(strict_types = 1);
namespace Atanor\TestBox\Test;

use Atanor\Core\Serialization\TreeSerializable;
use Atanor\TestBox\Parameter\DefaultParameterCollection;

class Configuration implements \ArrayAccess
{
    const CONFIG_TEST_CLASS = 'testClass';
    const CONFIG_NAME = 'name';

    /**
     * @var array
     */
    protected $parameters = [];

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        $this->parameters[$offset] = $value;
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return $this->parameters[$offset];
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        return isset($this->parameters[$offset]);
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        unset($this->parameters[$offset]);
    }

    /**
     * @return mixed
     */
    protected function getBoxObjectTree():array
    {
        if (is_string($this['box'])) return [TreeSerializable::CLASS_NAME => $this['box']];
        else return $this['box'];
    }

    /**
     * @inheritDoc
     */
    public function getObjectTree():array
    {
        $array = [
            TreeSerializable::CLASS_NAME => $this[static::CONFIG_TEST_CLASS],
            'name' => $this[static::CONFIG_NAME],
            'box' => $this->getBoxObjectTree(),

        ];
        return $array;

    }


}