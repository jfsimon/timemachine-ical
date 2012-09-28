<?php

namespace TimeMachine\ICal\Tests\Parser\Builder;

use TimeMachine\ICal\Model\Property;
use TimeMachine\ICal\Model\Parameter;
use TimeMachine\ICal\Parser\Builder\PropertyBuilder;
use TimeMachine\ICal\Parser\Token;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class PropertyBuilderTest extends AbstractBuilderTest
{
    public function test1()
    {
        $object = new Property('dstart');
        $builder = new PropertyBuilder($this->buildDocumentBuilder(), clone $object);
        $object->setValue('19970714T170000Z');
        $tokens = array(new Token(Token::VALUE, '19970714T170000Z'));

        $this->assertEquals($object, $this->build($builder, $tokens));
    }
}
