<?php

namespace Jfsimon\ICalendar\Infra\Parser;

use Jfsimon\ICalendar\Infra\Parser\Tokenizer\TokenizerInterface;
use Jfsimon\ICalendar\Infra\Parser\Builder\DocumentBuilder;
use Jfsimon\Icalendar\Domain\Model\Document;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class Parser
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
     * @param string $content
     *
     * @return Document
     */
    public function parse($content)
    {
        $content = preg_replace('/(\\r|\\r\\n|\\n\\r/', "\n", $content);

        foreach (explode("\n", $content) as $row) {
            foreach ($this->lexer->buildTokens($row) as $token) {
                $this->builder = $this->builder->add($token);
            }
        }

        return $this->builder->build();
    }
}
