<?php

namespace TimeMachine\ICal\Parser\Tokenizer;

use TimeMachine\ICal\Parser\Token;
use TimeMachine\ICal\Exception\TokenizerException;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class PropertyTokenizer implements TokenizerInterface
{
    /**
     * @var string
     */
    private $valueSeparator;

    /**
     * @var string
     */
    private $parametersSeparator;

    /**
     * @var TokenizerInterface
     */
    private $valueTokenizer;

    /**
     * @var TokenizerInterface
     */
    private $parameterTokenizer;

    /**
     * @param string             $valueSeparator
     * @param string             $parametersSeparator
     * @param TokenizerInterface $valueTokenizer
     * @param TokenizerInterface $parameterTokenizer
     */
    public function __construct($valueSeparator, $parametersSeparator, TokenizerInterface $valueTokenizer, TokenizerInterface $parameterTokenizer)
    {
        $this->valueSeparator = $valueSeparator;
        $this->parametersSeparator = $parametersSeparator;
        $this->valueTokenizer = $valueTokenizer;
        $this->parameterTokenizer= $parameterTokenizer;

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
        $pattern = sprintf('/^([a-z-_]+)(?:%s([^%s]*))?(?:%s(.*))?$/i', $this->valueSeparator, $this->parametersSeparator, $this->parametersSeparator);
        if (preg_match($pattern, $content, $matches)) {
            $tokens = array(new Token(Token::PROPERTY, $matches[1]));

            if (isset($matches[2]) && '' !== $matches[2]) {
                $tokens = array_merge($tokens, $this->valueTokenizer->buildTokens($matches[2]));
            }

            if (isset($matches[3])) {
                foreach (explode($this->parametersSeparator, $matches[3]) as $value) {
                    $tokens = array_merge($tokens, $this->parameterTokenizer->buildTokens($value));
                }
            }

            return $tokens;
        }

        throw TokenizerException::unsupportedContent($this, $content);
    }
}
