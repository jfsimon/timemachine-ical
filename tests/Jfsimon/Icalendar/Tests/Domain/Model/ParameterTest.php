<?php

namespace Jfsimon\ICalendar\Tests\Domain\Model;

use Jfsimon\ICalendar\Domain\Model\Component;
use Jfsimon\ICalendar\Domain\Model\Property;
use Jfsimon\ICalendar\Domain\Model\Parameter;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class ParameterTest extends \PHPUnit_Framework_TestCase
{
    public function testAddComponent()
    {
        $this->setExpectedException('Jfsimon\ICalendar\Domain\Exception\InvalidChildException');
        $root = new Parameter('root');
        $root->add(new Component('component'));
    }

    public function testAddProperty()
    {
        $this->setExpectedException('Jfsimon\ICalendar\Domain\Exception\InvalidChildException');
        $root = new Parameter('root');
        $root->add(new Property('property'));
    }

    public function testAddParameter()
    {
        $this->setExpectedException('Jfsimon\ICalendar\Domain\Exception\InvalidChildException');
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
