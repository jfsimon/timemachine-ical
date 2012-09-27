<?php

namespace Jfsimon\ICalendar\Infra\Parser\Tokenizer;

use Jfsimon\ICalendar\Infra\Parser\Token;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class ParameterTokenizer implements TokenizerInterface
{
    /**
     * @var string
     */
    private $separator;

    /**
     * @var TokenizerInterface
     */
    private $valueTokenizer;

    /**
     * @param string                  $separator
     * @param TokenizerInterface|null $valueTokenizer
     */
    public function __construct($separator, TokenizerInterface $valueTokenizer = null)
    {
        $this->separator = $separator;
        $this->valueTokenizer = $valueTokenizer ?: new ValueTokenizer();
    }

    /**
     * {@inheritdoc}
     */
    public function buildTokens($content)
    {
        if (preg_match('/^([a-z]+)'.$this->separator.'(.*)$/i', $content, $matches)) {
            return array_merge(
                array(new Token(Token::PROPERTY, $matches[1])),
                $this->valueTokenizer->buildTokens($matches[2])
            );
        }

        throw new \InvalidArgumentException();
    }
}
