<?php

namespace Jfsimon\Icalendar\Model;

use Jfsimon\Icalendar\Model\Bag\ParameterBag;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class Property extends AbstractObject
{
    /**
     * @var string
     */
    private $value;

    /**
     * @var ParameterBag
     */
    private $parameters;

    /**
     * @param string $name
     * @param string $value
     */
    public function __construct($name)
    {
        parent::__construct($name);
        $this->parameters = new ParameterBag();
        $this->value = '';
    }

    /**
     * @param mixed $child
     *
     * @throws \InvalidArgumentException
     */
    public function add(Parameter $child)
    {
        if ($child instanceof Parameter) {
            $this->parameters->add($child);
        }

        if (is_string($child)) {
            $this->value .= $child;
        }

        throw new \InvalidArgumentException();
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return ParameterBag
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}
