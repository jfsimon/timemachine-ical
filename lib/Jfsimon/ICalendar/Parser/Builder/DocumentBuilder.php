<?php

namespace Jfsimon\ICalendar\Parser\Builder;

use Jfsimon\ICalendar\Parser\Token;
use Jfsimon\Icalendar\Model\Component;
use Jfsimon\Icalendar\Model\Document;

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
            $this->document->add($builder);

            return $builder;
        }

        throw new \InvalidArgumentException();
    }

    public function build()
    {
        return $this->document;
    }
}
