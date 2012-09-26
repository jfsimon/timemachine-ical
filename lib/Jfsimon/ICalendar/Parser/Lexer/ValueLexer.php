<?php

namespace Jfsimon\ICalendar\Parser\Lexer;

use Jfsimon\ICalendar\Parser\Token;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class ValueLexer implements LexerInterface
{
    /**
     * {@inheritdoc}
     */
    public function buildTokens($content)
    {
        return array(new Token(Token::VALUE, $content));
    }
}
