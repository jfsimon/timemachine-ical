<?php

namespace TimeMachine\ICal\Model;

use TimeMachine\ICal\Exception\ModelException;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class Parameter extends NamedObject
{
    /**
     * @var string
     */
    private $value;

    /**
     * @param string $name
     * @param string $value
     */
    public function __construct($name, $value = '')
    {
        parent::__construct($name);
        $this->value = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function add($child)
    {
        if (is_string($child)) {
            $this->value .= $child;

            return;
        }

        throw ModelException::unsupportedChild('string', $child);
    }

    /**
     * {@inheritdoc}
     */
    public function getChildren()
    {
        return array();
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
}
