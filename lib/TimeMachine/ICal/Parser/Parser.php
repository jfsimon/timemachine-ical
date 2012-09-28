<?php

namespace TimeMachine\ICal\Parser;

use TimeMachine\ICal\Service\ParserInterface;
use TimeMachine\ICal\Parser\Tokenizer\TokenizerInterface;
use TimeMachine\ICal\Parser\Builder\DocumentBuilder;
use TimeMachine\ICal\Model\Document;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class Parser implements ParserInterface
{
    /**
     * @var TokenizerInterface
     */
    private $tokenizer;

    /**
     * @var DocumentBuilder
     */
    private $builder;

    /**
     * @param Tokenizer\TokenizerInterface $tokenizer
     * @param Builder\DocumentBuilder|null $builder
     */
    public function __construct(TokenizerInterface $tokenizer, DocumentBuilder $builder = null)
    {
        $this->tokenizer = $tokenizer;
        $this->builder = $builder ?: new DocumentBuilder(new Document());
    }

    /**
     * {@inheritdoc}
     */
    public function parse($content)
    {
        $content = preg_replace('/(\\r|\\r\\n|\\n\\r)/', "\n", $content);

        foreach (explode("\n", $content) as $row) {
            foreach ($this->tokenizer->buildTokens($row) as $token) {
                $this->builder = $this->builder->add($token);
            }
        }

        return $this->builder->build();
    }
}
