<?php

namespace Jfsimon\ICalendar\Parser;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class Token
{
    const BEGIN     = 1;
    const END       = 2;
    const PROPERTY  = 3;
    const PARAMETER = 4;
    const VALUE     = 5;

    /**
     * @var int
     */
    private $type;

    /**
     * @var string
     */
    private $value;

    /**
     * @param int    $type
     * @param string $value
     */
    public function __construct($type, $value)
    {
        if ($type < 1 || $type > 5) {
            throw new \InvalidArgumentException();
        }

        $this->type  = $type;
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function is($type)
    {
        return $type === $this->type;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
