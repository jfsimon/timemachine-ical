<?php

namespace TimeMachine\ICal\Parser\Builder;

use TimeMachine\ICal\Parser\Token;
use TimeMachine\ICal\Model\Component;
use TimeMachine\ICal\Model\Property;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class ComponentBuilder implements BuilderInterface
{
    private $parent;
    private $component;
    private $children;

    public function __construct(BuilderInterface $parent, Component $component)
    {
        $this->parent = $parent;
        $this->component = $component;
        $this->children = array();
    }

    public function add(Token $token)
    {
        if ($token->is(Token::BEGIN)) {
            $builder = new ComponentBuilder($this, new Component($token->getValue()));
            $this->children[] = $builder;

            return $builder;
        }

        if ($token->is(Token::END)) {
            if ($token->getValue() !== $this->component->getName()) {
                throw new \InvalidArgumentException();
            }

            return $this->parent;
        }

        if ($token->is(Token::PROPERTY)) {
            $builder = new PropertyBuilder($this, new Property($token->getValue()));
            $this->children[] = $builder;

            return $builder;
        }

        var_dump($this, $token); die;

        // parameter or value token
        throw new \InvalidArgumentException();
    }

    public function build()
    {
        foreach ($this->children as $child) {
            $this->component->add($child->build());
        }

        return $this->component;
    }
}
