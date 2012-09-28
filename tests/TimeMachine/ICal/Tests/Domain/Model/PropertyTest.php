<?php

namespace TimeMachine\ICal\Tests\Domain\Model;

use TimeMachine\ICal\Domain\Model\Component;
use TimeMachine\ICal\Domain\Model\Property;
use TimeMachine\ICal\Domain\Model\Parameter;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class PropertyTest extends \PHPUnit_Framework_TestCase
{
    public function testAddComponent()
    {
        $this->setExpectedException('TimeMachine\ICal\Domain\Exception\InvalidChildException');
        $root = new Property('root');
        $root->add(new Component('component'));
    }

    public function testAddProperty()
    {
        $this->setExpectedException('TimeMachine\ICal\Domain\Exception\InvalidChildException');
        $root = new Property('root');
        $root->add(new Property('property'));
    }

    public function testAddParameter()
    {
        $root = new Property('root');
        $root->add(new Parameter('parameter'));

        $this->assertCount(1, $root->getParameters());
        $this->assertSame('PARAMETER', $root->getParameters()->first()->getName());
    }

    public function testAddString()
    {
        $root = new Property('root');
        $root->add('string');

        $this->assertSame('string', $root->getValue());
    }
}
