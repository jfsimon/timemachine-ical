<?php

namespace TimeMachine\ICal\Model;

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
     * @throws \TimeMachine\ICal\Exception\ModelException
     */
    function add($child);

    /**
     * Returns children.
     *
     * @return array
     */
    function getChildren();
}
