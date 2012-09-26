<?php

namespace Jfsimon\ICalendar\Parser;

use Jfsimon\ICalendar\Parser\Lexer\LexerInterface;
use Jfsimon\ICalendar\Parser\Builder\DocumentBuilder;
use Jfsimon\Icalendar\Model\Document;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class Parser
{
    private $lexer;
    private $builder;

    public function __construct(LexerInterface $lexer, DocumentBuilder $builder = null)
    {
        $this->lexer = $lexer;
        $this->builder = $builder ?: new DocumentBuilder(new Document());
    }

    public function parse($content)
    {
        $content = preg_replace('/(\\r|\\r\\n|\\n\\r/', "\n", $content);

        foreach (explode("\n", $content) as $row) {
            foreach ($this->lexer->buildTokens($row) as $token) {
                $this->builder = $this->builder->add($token);
            }
        }

        return $this->builder->build();
    }
}
