<?php

namespace TimeMachine\ICal\Model;

use TimeMachine\ICal\Collection\ParameterCollection;
use TimeMachine\ICal\Exception\ModelException;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class Property extends NamedObject
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
     * @param string $value
     */
    public function __construct($name, $value = '')
    {
        parent::__construct($name);
        $this->parameters = new ParameterCollection();
        $this->value = $value;
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

        throw ModelException::unsupportedChild('Parameter or string', $child);
    }

    /**
     * {@inheritdoc}
     */
    public function getChildren()
    {
        return iterator_to_array($this->parameters);
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
