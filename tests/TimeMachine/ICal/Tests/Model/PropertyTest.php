<?php

namespace TimeMachine\ICal\Tests\Model;

use TimeMachine\ICal\Model\Component;
use TimeMachine\ICal\Model\Property;
use TimeMachine\ICal\Model\Parameter;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class PropertyTest extends \PHPUnit_Framework_TestCase
{
    public function testAddComponent()
    {
        $this->setExpectedException('\TimeMachine\ICal\Exception\ModelException');
        $root = new Property('root');
        $root->add(new Component('component'));
    }

    public function testAddProperty()
    {
        $this->setExpectedException('\TimeMachine\ICal\Exception\ModelException');
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
