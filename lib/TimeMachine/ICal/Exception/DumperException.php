<?php

namespace TimeMachine\ICal\Exception;

use TimeMachine\ICal\Model\ObjectInterface;

/**
 * Dumper exception.
 *
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class DumperException extends \InvalidArgumentException
{
    /**
     * Tried to dump unsupported object.
     *
     * @param ObjectInterface $object
     *
     * @return DumperException
     */
    public static function unsupportedObject(ObjectInterface $object)
    {
        return new self('Could not dump object of type: "'.get_class($object).'".');
    }
}
