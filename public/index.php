<?php
declare(strict_types = 1);
namespace Test;
use Atanor\TestBox\Application\Application;
use Atanor\TestBox\Generator\ArrayGenerator;
use Atanor\TestBox\SetPoint\Equals;
use Atanor\TestBox\Test\MethodTest;
use Atanor\TestBox\Test\MethodTestGhost;
use Calculator;
require_once 'Calculator.php';

require "../vendor/autoload.php";

$application = new Application();
$application->setUpTest([
    'type' => MethodTestGhost::class,
    'objectType' => MethodTest::class,
    'name' => 'MyTestTest',
    'testedMethod' => 'add',
    'setPoints' => [
        [
            'monitoredData' => 'output',
            'type' => Equals::class,
            'name' => 'checkOutputEquals'
        ]
    ],
    'sample' => [
        'objectType' => Calculator::class,
    ],
    'generator' => [
        'type' => ArrayGenerator::class,
        'data' => [
            'inputs' => [
                [1,2]
            ],
            'ExpectedValues' => [
                [
                    'checkOutputEquals' => 3,
                ],
            ],
        ],
    ],
]);
$application->runTest();

