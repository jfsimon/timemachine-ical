<?php

namespace TimeMachine\ICal\Parser\Builder;

use TimeMachine\ICal\Parser\Token;
use TimeMachine\ICal\Model\Document;
use TimeMachine\ICal\Model\Component;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class DocumentBuilder implements BuilderInterface
{
    private $document;
    private $children;

    public function __construct(Document $document)
    {
        $this->document = $document;
        $this->children = array();
    }

    public function add(Token $token)
    {
        if ($token->is(Token::BEGIN)) {
            $builder = new ComponentBuilder($this, new Component($token->getValue()));
            $this->children[] = $builder;

            return $builder;
        }

        throw new \InvalidArgumentException();
    }

    public function build()
    {
        foreach ($this->children as $child) {
            $this->document->add($child->build());
        }

        return $this->document;
    }
}
