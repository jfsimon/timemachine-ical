<?php

namespace TimeMachine\ICal\Infra\Parser;

use TimeMachine\ICal\Domain\Service\ParserInterface;
use TimeMachine\ICal\Infra\Parser\Tokenizer\TokenizerInterface;
use TimeMachine\ICal\Infra\Parser\Builder\DocumentBuilder;
use TimeMachine\ICal\Domain\Model\Document;

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
        $content = preg_replace('/(\\r|\\r\\n|\\n\\r/', "\n", $content);

        foreach (explode("\n", $content) as $row) {
            foreach ($this->tokenizer->buildTokens($row) as $token) {
                $this->builder = $this->builder->add($token);
            }
        }

        return $this->builder->build();
    }
}
