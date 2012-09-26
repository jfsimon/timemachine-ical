<?php

namespace Jfsimon\ICalendar\Parser\Lexer;

use Jfsimon\ICalendar\Parser\Token;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class PrefixedLexer implements LexerInterface
{
    private $prefix;

    private $token;

    public function __construct($prefix, $token)
    {
        $this->prefix = $prefix;
        $this->token = $token;
    }

    public function buildTokens($content)
    {
        if (preg_match('/^'.$this->prefix.'(.*)$/i', $content, $matches)) {
            return array(new Token($this->token, $matches[1]));
        }

        throw new \InvalidArgumentException();
    }
}
