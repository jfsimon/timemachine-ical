<?php

namespace Jfsimon\ICalendar\Tests\Infra\Parser\Builder;

use Jfsimon\ICalendar\Domain\Model\Component;
use Jfsimon\ICalendar\Domain\Model\Property;
use Jfsimon\ICalendar\Infra\Parser\Builder\ComponentBuilder;
use Jfsimon\ICalendar\Infra\Parser\Token;

abstract class ComponentBuilderTest extends AbstractBuilderTest
{
    public function test1()
    {
        $vcalendar = new Component('vcalendar');
        $builder = new ComponentBuilder($this->buildDocumentBuilder(), clone $vcalendar);
        $vcalendar->add(new Property('version', '2.0'));
        $vcalendar->add($vevent = new Component('vevent'));
        $vevent->add(new Property('dstart', '19970714T170000Z'));
        $tokens = array(
            new Token(Token::PROPERTY, 'VERSION'),
            new Token(Token::VALUE,    '2.0'),
            new Token(Token::BEGIN,    'VEVENT'),
                new Token(Token::PROPERTY, 'DTSTART'),
                new Token(Token::VALUE,    '19970714T170000Z'),
            new Token(Token::END,      'VEVENT'),
        );

        $this->assertEquals($vcalendar, $this->build($builder, $tokens));
    }
}
