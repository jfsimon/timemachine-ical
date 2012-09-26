<?php

namespace Jfsimon\Icalendar\Model;

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
     * @param mixed $child
     *
     * @throws \InvalidArgumentException
     */
    public function add($child)
    {
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
}
