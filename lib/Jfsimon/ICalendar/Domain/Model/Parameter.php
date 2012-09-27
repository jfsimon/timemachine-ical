<?php

namespace Jfsimon\ICalendar\Domain\Model;

use Jfsimon\ICalendar\Domain\Exception\InvalidChildException;

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
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
