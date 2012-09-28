<?php

namespace TimeMachine\ICal\Exception;

/**
 * Collection exception.
 *
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class CollectionException extends \LogicException
{
    /**
     * Tried to access first child of empty collection.
     *
     * @return CollectionException
     */
    public static function noChild()
    {
        return new self('Could not access first child of empty collection.');
    }
}
