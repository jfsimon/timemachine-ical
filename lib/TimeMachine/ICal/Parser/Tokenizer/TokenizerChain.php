<?php

namespace TimeMachine\ICal\Parser\Tokenizer;

use TimeMachine\ICal\Exception\TokenizerException;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class TokenizerChain implements TokenizerInterface
{
    /**
     * @var TokenizerInterface[]
     */
    private $tokenizers;

    /**
     * Constructor.
     */
    public function __construct(array $tokenizers = array())
    {
        $this->tokenizers = array();
        foreach ($tokenizers as $tokenizer) {
            $this->addTokenizer($tokenizer);
        }
    }

    /**
     * @param TokenizerInterface $tokenizer
     */
    public function addTokenizer(TokenizerInterface $tokenizer)
    {
        $this->tokenizers[] = $tokenizer;
    }

    /**
     * {@inheritdoc}
     */
    public function buildTokens($content)
    {
        foreach ($this->tokenizers as $tokenizer) {
            try {
                return $tokenizer->buildTokens($content);
            } catch (TokenizerException $exception) {
                continue;
            }
        }

        throw TokenizerException::unsupportedContent($this, $content);
    }
}
