<?php

namespace TimeMachine\ICal\Parser\Tokenizer;

use TimeMachine\ICal\Parser\Token;
use TimeMachine\ICal\Exception\TokenizerException;

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
        // skip empty parameter
        if ('' === $content) {
            return array();
        }

        if (preg_match('/^([a-z-_]+)(?:'.$this->separator.'(.*))?$/i', $content, $matches)) {
            return array_merge(
                array(new Token(Token::PARAMETER, $matches[1])),
                $this->valueTokenizer->buildTokens($matches[2])
            );
        }

        throw TokenizerException::unsupportedContent($content);
    }
}
