<?php

namespace TimeMachine\ICal\Tests\Model;

use TimeMachine\ICal\Model\Document;
use TimeMachine\ICal\Model\Component;
use TimeMachine\ICal\Model\Property;
use TimeMachine\ICal\Model\Parameter;

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
        $this->setExpectedException('\TimeMachine\ICal\Exception\ModelException');
        $root = new Document();
        $root->add(new Property('property'));
    }

    public function testAddParameter()
    {
        $this->setExpectedException('\TimeMachine\ICal\Exception\ModelException');
        $root = new Document();
        $root->add(new Parameter('parameter'));
    }

    public function testAddString()
    {
        $this->setExpectedException('\TimeMachine\ICal\Exception\ModelException');
        $root = new Document();
        $root->add('string');
    }
}
