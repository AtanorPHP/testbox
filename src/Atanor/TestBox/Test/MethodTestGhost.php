<?php
declare(strict_types = 1);
namespace Atanor\TestBox\Test;

use Atanor\Di\Graph\Ghost\DefaultGraphedGhost;
use Atanor\Di\Graph\Ghost\Ghost;

class MethodTestGhost extends TestGhost
{
    /**
     * @inheritDoc
     */
    public static function build(array $params):Ghost
    {
        $ghost = parent::build($params);
        /** @var MethodTestGhost $ghost */
        $ghost->addProperty('testedMethod',$params['testedMethod']);
        $ghost->addProperty('sample',DefaultGraphedGhost::build($params['sample']));
        return $ghost;
    }

}