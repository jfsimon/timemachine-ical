<?php

namespace Jfsimon\ICalendar\Domain\Exception;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class InvalidChildException extends \InvalidArgumentException
{
    public function __construct($expected, $given)
    {
        parent::__construct(sprintf(
            'Invalid child: %s expected but %s given.',
            $expected,
            is_object($given) ? get_class($given) : 'scalar'
        ));
    }
}
