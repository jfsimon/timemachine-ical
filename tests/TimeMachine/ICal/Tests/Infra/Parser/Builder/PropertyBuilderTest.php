<?php

namespace TimeMachine\ICal\Tests\Infra\Parser\Builder;

use TimeMachine\ICal\Domain\Model\Property;
use TimeMachine\ICal\Domain\Model\Parameter;
use TimeMachine\ICal\Infra\Parser\Builder\PropertyBuilder;
use TimeMachine\ICal\Infra\Parser\Token;

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
