<?php

namespace Jfsimon\ICalendar\Parser\Lexer;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class LexerChain implements LexerInterface
{
    private $lexers;

    public function __construct()
    {
        $this->lexers = array();
    }

    public function addLexer(LexerInterface $lexer)
    {
        $this->lexers[] = $lexer;
    }

    public function buildTokens($content)
    {
        foreach ($this->lexers as $lexer) {
            try {
                return $lexer->buildTokens($content);
            } catch (\InvalidArgumentException $e) {
                continue;
            }
        }

        throw new \InvalidArgumentException();
    }
}
