<?php

namespace TimeMachine\ICal\Exception;

/**
 * Model exception.
 *
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class ModelException extends \InvalidArgumentException
{
    /**
     * Tried to add unsupported child.
     *
     * @param string $expected
     * @param mixed  $given
     *
     * @return ModelException
     */
    public static function unsupportedChild($expected, $given)
    {
        return new self(sprintf(
            'Invalid child: %s expected but %s given.',
            $expected,
            is_object($given) ? get_class($given) : 'scalar'
        ));
    }
}
