<?php

namespace Jfsimon\ICalendar\Parser\Lexer;

use Jfsimon\ICalendar\Parser\Token;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class PropertyLexer implements LexerInterface
{
    /**
     * @var string
     */
    private $separator;

    /**
     * @var string
     */
    private $valueSeparator;

    /**
     * @var LexerInterface
     */
    private $valueLexer;

    /**
     * @param string         $separator
     * @param LexerInterface $valueLexer
     */
    public function __construct($separator, $valueSeparator, LexerInterface $valueLexer)
    {
        $this->separator = $separator;
        $this->valueSeparator = $valueSeparator;
        $this->valueLexer = $valueLexer;

        if (null === $this->valueLexer = $valueLexer) {
            $this->valueLexer = new LexerChain();
            $this->valueLexer->addLexer(new ParameterLexer(new ValueLexer()));
            $this->valueLexer->addLexer(new ValueLexer());
        }
    }

    /**
     * {@inheritdoc}
     */
    public function buildTokens($content)
    {
        if (preg_match('/^([a-z]+)'.$this->separator.'(.*)$/i', $content, $matches)) {
            $tokens = array(new Token(Token::PROPERTY, $matches[1]));

            foreach (explode($this->valueSeparator, $matches[2]) as $value) {
                $tokens = array_merge($tokens, $this->valueLexer->buildTokens($value));
            }
        }

        throw new \InvalidArgumentException();
    }
}
