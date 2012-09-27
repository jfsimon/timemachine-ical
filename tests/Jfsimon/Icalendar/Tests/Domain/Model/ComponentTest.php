<?php

namespace Jfsimon\ICalendar\Tests\Domain\Model;

use Jfsimon\ICalendar\Domain\Model\Component;
use Jfsimon\ICalendar\Domain\Model\Property;
use Jfsimon\ICalendar\Domain\Model\Parameter;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class ComponentTest extends \PHPUnit_Framework_TestCase
{
    public function testAddComponent()
    {
        $root = new Component('root');
        $root->add(new Component('component'));

        $this->assertCount(1, $root->getComponents());
        $this->assertSame('COMPONENT', $root->getComponents()->first()->getName());
    }

    public function testAddProperty()
    {
        $root = new Component('root');
        $root->add(new Property('property'));

        $this->assertCount(1, $root->getProperties());
        $this->assertSame('PROPERTY', $root->getProperties()->first()->getName());
    }

    public function testAddParameter()
    {
        $this->setExpectedException('Jfsimon\ICalendar\Domain\Exception\InvalidChildException');
        $root = new Component('root');
        $root->add(new Parameter('parameter'));
    }

    public function testAddString()
    {
        $this->setExpectedException('Jfsimon\ICalendar\Domain\Exception\InvalidChildException');
        $root = new Component('root');
        $root->add('string');
    }
}
