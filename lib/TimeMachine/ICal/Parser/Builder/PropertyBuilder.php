<?php

namespace TimeMachine\ICal\Parser\Builder;

use TimeMachine\ICal\Parser\Token;
use TimeMachine\ICal\Model\Property;
use TimeMachine\ICal\Model\Parameter;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class PropertyBuilder implements BuilderInterface
{
    private $parent;
    private $property;
    private $children;

    public function __construct(BuilderInterface $parent, Property $property)
    {
        $this->parent = $parent;
        $this->property = $property;
        $this->children = array();
    }

    public function add(Token $token)
    {
        if ($token->is(Token::VALUE)) {
            $this->property->add($token->getValue());

            return $this;
        }

        if ($token->is(Token::PARAMETER)) {
            $builder = new ParameterBuilder($this, new Parameter($token->getValue()));
            $this->children[] = $builder;

            return $builder;
        }

        return $this->parent->add($token);
    }

    public function build()
    {
        foreach ($this->children as $child) {
            $this->property->add($child->build());
        }

        return $this->property;
    }
}
