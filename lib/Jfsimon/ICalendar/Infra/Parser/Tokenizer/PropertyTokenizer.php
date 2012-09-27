<?php

namespace Jfsimon\ICalendar\Infra\Parser\Tokenizer;

use Jfsimon\ICalendar\Infra\Parser\Token;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class PropertyTokenizer implements TokenizerInterface
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
     * @var TokenizerInterface
     */
    private $valueTokenizer;

    /**
     * @param string             $separator
     * @param string             $valueSeparator
     * @param TokenizerInterface $valueTokenizer
     */
    public function __construct($separator, $valueSeparator, TokenizerInterface $valueTokenizer)
    {
        $this->separator = $separator;
        $this->valueSeparator = $valueSeparator;
        $this->valueTokenizer = $valueTokenizer;

        if (null === $this->valueTokenizer = $valueTokenizer) {
            $this->valueTokenizer = new TokenizerChain();
            $this->valueTokenizer->addTokenizer(new ParameterTokenizer(new ValueTokenizer()));
            $this->valueTokenizer->addTokenizer(new ValueTokenizer());
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
                $tokens = array_merge($tokens, $this->valueTokenizer->buildTokens($value));
            }
        }

        throw new \InvalidArgumentException();
    }
}
