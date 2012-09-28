<?php

namespace TimeMachine\ICal\Tests;

use TimeMachine\ICal\ICal;
use TimeMachine\ICal\Dumper\Formatter\RFC2445Formatter;

class ICalTest extends \PHPUnit_Framework_TestCase
{
    public function testVevent()
    {
        $this->assertEquals(Sources::vevent(), Ical::dump(ICal::parse(Sources::vevent()), new RFC2445Formatter(PHP_EOL)));
        $this->assertEquals(Documents::vevent(), Ical::parse(ICal::dump(Documents::vevent())));
    }
}
