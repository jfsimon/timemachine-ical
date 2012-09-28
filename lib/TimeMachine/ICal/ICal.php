<?php

namespace TimeMachine\ICal;

use TimeMachine\ICal\Domain\Model\Document;
use TimeMachine\ICal\Infra\Parser\Parser;
use TimeMachine\ICal\Infra\Parser\Tokenizer\TokenizerInterface;
use TimeMachine\ICal\Infra\Parser\Tokenizer\RFC2445Tokenizer;
use TimeMachine\ICal\Infra\Dumper\Dumper;
use TimeMachine\ICal\Infra\Dumper\Formatter\FormatterInterface;
use TimeMachine\ICal\Infra\Dumper\Formatter\RFC2445Formatter;

/**
 * ICal class.
 *
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class ICal
{
    /**
     * Parses content using given tokenizer.
     *
     * @param string                  $content
     * @param null|TokenizerInterface $tokenizer
     *
     * @return Document
     */
    public static function parse($content, $tokenizer = null)
    {
        $parser = new Parser($tokenizer ?: new RFC2445Tokenizer());

        return $parser->parse($content);
    }

    /**
     * Dumps document using given formatter.
     *
     * @param Document                $document
     * @param null|FormatterInterface $formatter
     *
     * @return string
     */
    public static function dump(Document $document, $formatter = null)
    {
        $dumper = new Dumper($formatter ?: new RFC2445Formatter());

        return $dumper->dump($document);
    }
}
