<?php

namespace TimeMachine\ICal\Tests\Domain\Model;

use TimeMachine\ICal\Domain\Model\Component;
use TimeMachine\ICal\Domain\Model\Property;
use TimeMachine\ICal\Domain\Model\Parameter;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class ParameterTest extends \PHPUnit_Framework_TestCase
{
    public function testAddComponent()
    {
        $this->setExpectedException('TimeMachine\ICal\Domain\Exception\InvalidChildException');
        $root = new Parameter('root');
        $root->add(new Component('component'));
    }

    public function testAddProperty()
    {
        $this->setExpectedException('TimeMachine\ICal\Domain\Exception\InvalidChildException');
        $root = new Parameter('root');
        $root->add(new Property('property'));
    }

    public function testAddParameter()
    {
        $this->setExpectedException('TimeMachine\ICal\Domain\Exception\InvalidChildException');
        $root = new Parameter('root');
        $root->add(new Parameter('parameter'));
    }

    public function testAddString()
    {
        $root = new Parameter('root');
        $root->add('string');

        $this->assertSame('string', $root->getValue());
    }
}
