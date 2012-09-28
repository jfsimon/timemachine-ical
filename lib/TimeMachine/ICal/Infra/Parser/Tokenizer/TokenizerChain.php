<?php

namespace TimeMachine\ICal\Infra\Parser\Tokenizer;

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
    public function __construct()
    {
        $this->tokenizers = array();
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
            } catch (\InvalidArgumentException $e) {
                continue;
            }
        }

        throw new \InvalidArgumentException();
    }
}
