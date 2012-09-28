<?php

namespace TimeMachine\ICal\Tests\Model;

use TimeMachine\ICal\Model\Component;
use TimeMachine\ICal\Model\Property;
use TimeMachine\ICal\Model\Parameter;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class ParameterTest extends \PHPUnit_Framework_TestCase
{
    public function testAddComponent()
    {
        $this->setExpectedException('\TimeMachine\ICal\Exception\ModelException');
        $root = new Parameter('root');
        $root->add(new Component('component'));
    }

    public function testAddProperty()
    {
        $this->setExpectedException('\TimeMachine\ICal\Exception\ModelException');
        $root = new Parameter('root');
        $root->add(new Property('property'));
    }

    public function testAddParameter()
    {
        $this->setExpectedException('\TimeMachine\ICal\Exception\ModelException');
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
