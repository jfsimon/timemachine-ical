<?php

namespace Jfsimon\ICalendar\Tests\Infra\Parser\Builder;

use Jfsimon\ICalendar\Domain\Model\Property;
use Jfsimon\ICalendar\Domain\Model\Parameter;
use Jfsimon\ICalendar\Infra\Parser\Builder\PropertyBuilder;
use Jfsimon\ICalendar\Infra\Parser\Token;

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
