<?php

namespace Jfsimon\ICalendar\Parser\Lexer;

use Jfsimon\ICalendar\Parser\Token;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class ParameterLexer implements LexerInterface
{
    /**
     * @var LexerInterface
     */
    private $valueLexer;

    /**
     * @var string
     */
    private $separator;

    /**
     * @param string              $separator
     * @param LexerInterface|null $valueLexer
     */
    public function __construct($separator, LexerInterface $valueLexer = null)
    {
        $this->valueLexer = $valueLexer ?: new ValueLexer();
    }

    /**
     * {@inheritdoc}
     */
    public function buildTokens($content)
    {
        if (preg_match('/^([a-z])'.$this->separator.'(.*)$/i', $content, $matches)) {
            return array_merge(
                array(new Token(Token::PROPERTY, $matches[1])),
                $this->valueLexer->buildTokens($matches[2])
            );
        }

        throw new \InvalidArgumentException();
    }
}
