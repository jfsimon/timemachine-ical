<?php

namespace TimeMachine\ICal\Tests\Parser\Builder;

use TimeMachine\ICal\Parser\Parser;
use TimeMachine\ICal\Parser\Tokenizer\RFC2445Tokenizer;
use TimeMachine\ICal\Model\Component;
use TimeMachine\ICal\Model\Property;
use TimeMachine\ICal\Model\Parameter;

/**
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 */
class ParserTest extends \PHPUnit_Framework_TestCase
{
    public function testVevent()
    {
        $code = <<<EOF
BEGIN:VEVENT
DTSTART:20010714T170000Z
DTEND:20010715T035959Z
SUMMARY:Bastille Day Party
ATTACH;FMTTYPE=image/jpeg:http://domain.com/images/bastille.jpg
END:VEVENT
EOF;

        $vevent = new Component('VEVENT');
        $vevent->add(new Property('DTSTART', '20010714T170000Z'));
        $vevent->add(new Property('DTEND', '20010715T035959Z'));
        $vevent->add(new Property('SUMMARY', 'Bastille Day Party'));
        $vevent->add($attach = new Property('ATTACH'));
        $attach->add(new Parameter('FMTTYPE', 'image/jpeg:http://domain.com/images/bastille.jpg'));

        $parser = new Parser(new RFC2445Tokenizer());
        $this->assertEquals($vevent, $parser->parse($code)->getComponents()->first());
    }
}
