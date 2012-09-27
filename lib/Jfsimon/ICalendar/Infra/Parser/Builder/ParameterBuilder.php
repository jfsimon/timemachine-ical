<?php

namespace Jfsimon\ICalendar\Infra\Parser\Builder;

use Jfsimon\ICalendar\Infra\Parser\Token;
use Jfsimon\Icalendar\Domain\Model\Parameter;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class ParameterBuilder implements BuilderInterface
{
    private $parent;
    private $parameter;

    public function __construct(BuilderInterface $parent, Parameter $parameter)
    {
        $this->parent = $parent;
        $this->parameter = $parameter;
    }

    public function add(Token $token)
    {
        if ($token->is(Token::VALUE)) {
            $this->parameter->add($token->getValue());
        }

        return $this->parent->add($token);
    }

    public function build()
    {
        return $this->parameter;
    }
}