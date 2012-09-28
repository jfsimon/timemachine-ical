<?php

namespace TimeMachine\ICal\Tests\Parser\Dumper;

use TimeMachine\ICal\Dumper\Dumper;
use TimeMachine\ICal\Dumper\Formatter\RFC2445Formatter;
use TimeMachine\ICal\Model\Document;
use TimeMachine\ICal\Model\Component;
use TimeMachine\ICal\Model\Property;
use TimeMachine\ICal\Model\Parameter;
use TimeMachine\ICal\Tests\Documents;
use TimeMachine\ICal\Tests\Sources;

/**
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 */
class DumperTest extends \PHPUnit_Framework_TestCase
{
    public function testVevent()
    {
        $dumper = new Dumper(new RFC2445Formatter(PHP_EOL));
        $this->assertEquals(Sources::vevent(), $dumper->dump(Documents::vevent()));
    }
}
