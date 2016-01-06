<?php
declare(strict_types = 1);
namespace Atanor\TestBox\Test;

use Atanor\Di\Graph\Ghost\DefaultGhost;
use Atanor\Di\Graph\Ghost\DefaultGraphedGhost;
use Atanor\Di\Graph\Ghost\Ghost;
use Atanor\TestBox\Box\MethodBox;
use Atanor\TestBox\SetPoint\SetPointCollection;

class TestGhost extends DefaultGraphedGhost
{
    /**
     * @inheritDoc
     */
    public static function build(array $params):Ghost
    {
        /** @var  TestGhost $testGhost */
        $testGhost =  parent::build($params);
        $setPoints = $testGhost->addPropertyGhost('setPoints',SetPointCollection::class);
        $testGhost->addPropertyGhost('box',MethodBox::class);
        if (isset($params['setPoints'])) {
            foreach($params['setPoints'] as $setPointParams) {
                $setPointClass = $setPointParams['type'];
                $setPoint = $setPoints->addPropertyGhost('setPoints',$setPointClass,[],DefaultGhost::class);
                $setPoint->addProperty('monitoredData',$setPointParams['monitoredData']);
                $setPoint->addProperty('name',$setPointParams['name']);
            }
        }
        if (isset($params['generator'])) {
            $generatorGhost = $testGhost->addPropertyGhost('generator',$params['generator']['type']);
            $generatorGhost->addProperty('data',$params['generator']['data']);
        }
        $testGhost->addProperty('name',$params['name']);
        return $testGhost;
    }

}