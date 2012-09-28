<?php

namespace TimeMachine\ICal\Tests\Parser\Dumper;

use TimeMachine\ICal\Dumper\Dumper;
use TimeMachine\ICal\Dumper\Formatter\RFC2445Formatter;
use TimeMachine\ICal\Model\Document;
use TimeMachine\ICal\Model\Component;
use TimeMachine\ICal\Model\Property;
use TimeMachine\ICal\Model\Parameter;

/**
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 */
class DumperTest extends \PHPUnit_Framework_TestCase
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

        $document = new Document();
        $document->add($vevent = new Component('VEVENT'));
        $vevent->add(new Property('DTSTART', '20010714T170000Z'));
        $vevent->add(new Property('DTEND', '20010715T035959Z'));
        $vevent->add(new Property('SUMMARY', 'Bastille Day Party'));
        $vevent->add($attach = new Property('ATTACH'));
        $attach->add(new Parameter('FMTTYPE', 'image/jpeg:http://domain.com/images/bastille.jpg'));

        $dumper = new Dumper(new RFC2445Formatter());
        $this->assertEquals($code, $dumper->dump($document));
    }
}
