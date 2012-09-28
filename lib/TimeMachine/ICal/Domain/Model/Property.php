<?php

namespace TimeMachine\ICal\Domain\Model;

use TimeMachine\ICal\Domain\Collection\ParameterCollection;
use TimeMachine\ICal\Domain\Exception\InvalidChildException;

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
     * @var ParameterCollection
     */
    private $parameters;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        parent::__construct($name);
        $this->parameters = new ParameterCollection();
        $this->value = '';
    }

    /**
     * {@inheritdoc}
     */
    public function add($child)
    {
        if ($child instanceof Parameter) {
            $this->parameters->add($child);

            return;
        }

        if (is_string($child)) {
            $this->value .= $child;

            return;
        }

        throw new InvalidChildException('Parameter or string', $child);
    }

    /**
     * {@inheritdoc}
     */
    public function getChildren()
    {
        return array_merge($this->parameters);
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return ParameterCollection
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}
