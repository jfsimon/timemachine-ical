<?php

namespace Jfsimon\Icalendar;

use Jfsimon\ICalendar\Parser\Parser;
use Jfsimon\ICalendar\Parser\Tokenizer\RFC2445Tokenizer;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class ICalendar
{
    public static function parse($content, $lexer = null)
    {
        $parser = new Parser($lexer ?: new RFC2445Tokenizer());

        return $parser->parse($content);
    }

    public static function dump(Document $document, $formatter = null)
    {
        $dumper = new Dumper($formatter ?: new RFC2445Formatter());

        return $dumper->dump($document);
    }
}
