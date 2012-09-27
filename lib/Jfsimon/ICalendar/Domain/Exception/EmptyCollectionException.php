<?php

namespace Jfsimon\ICalendar\Domain\Exception;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class EmptyCollectionException extends \LogicException
{
    public function __construct()
    {
        parent::__construct('Cannot find child from empty collection..');
    }
}
