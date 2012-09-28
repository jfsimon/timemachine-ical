<?php

namespace TimeMachine\ICal\Domain\Model;

use TimeMachine\ICal\Domain\Exception\InvalidChildException;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class Parameter extends AbstractObject
{
    /**
     * @var string
     */
    private $value;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        parent::__construct($name);
        $this->value = '';
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

        throw new InvalidChildException('string', $child);
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
