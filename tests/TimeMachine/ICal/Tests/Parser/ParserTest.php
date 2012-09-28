<?php

namespace TimeMachine\ICal\Tests\Parser\Builder;

use TimeMachine\ICal\Parser\Parser;
use TimeMachine\ICal\Parser\Tokenizer\RFC2445Tokenizer;
use TimeMachine\ICal\Model\Document;
use TimeMachine\ICal\Model\Component;
use TimeMachine\ICal\Model\Property;
use TimeMachine\ICal\Model\Parameter;
use TimeMachine\ICal\Tests\Documents;
use TimeMachine\ICal\Tests\Sources;

/**
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 */
class ParserTest extends \PHPUnit_Framework_TestCase
{
    public function testVevent()
    {
        $parser = new Parser(new RFC2445Tokenizer());
        $this->assertEquals(Documents::vevent(), $parser->parse(Sources::vevent()));
    }
}
