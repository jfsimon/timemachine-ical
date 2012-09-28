<?php

namespace TimeMachine\ICal\Domain\Model;

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
     * @throws \TimeMachine\ICal\Domain\Exception\InvalidChildException
     */
    function add($child);

    /**
     * Returns children.
     *
     * @return array
     */
    function getChildren();
}
