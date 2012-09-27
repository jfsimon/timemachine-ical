<?php

namespace Jfsimon\ICalendar\Tests\Domain\Model;

use Jfsimon\ICalendar\Domain\Model\Document;
use Jfsimon\ICalendar\Domain\Model\Component;
use Jfsimon\ICalendar\Domain\Model\Property;
use Jfsimon\ICalendar\Domain\Model\Parameter;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class DocumentTest extends \PHPUnit_Framework_TestCase
{
    public function testAddComponent()
    {
        $root = new Document();
        $root->add(new Component('component'));

        $this->assertCount(1, $root->getComponents());
        $this->assertSame('COMPONENT', $root->getComponents()->first()->getName());
    }

    public function testAddProperty()
    {
        $this->setExpectedException('Jfsimon\ICalendar\Domain\Exception\InvalidChildException');
        $root = new Document();
        $root->add(new Property('property'));
    }

    public function testAddParameter()
    {
        $this->setExpectedException('Jfsimon\ICalendar\Domain\Exception\InvalidChildException');
        $root = new Document();
        $root->add(new Parameter('parameter'));
    }

    public function testAddString()
    {
        $this->setExpectedException('Jfsimon\ICalendar\Domain\Exception\InvalidChildException');
        $root = new Document();
        $root->add('string');
    }
}
