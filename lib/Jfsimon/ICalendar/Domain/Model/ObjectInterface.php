<?php

namespace Jfsimon\ICalendar\Domain\Model;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
interface ObjectInterface
{
    /**
     * Adds a child.
     *
     * @param mixed $child
     *
     * @throws \Jfsimon\ICalendar\Domain\Exception\InvalidChildException
     */
    function add($child);

    /**
     * Returns object name
     *
     * @return string
     */
    function getName();
}
