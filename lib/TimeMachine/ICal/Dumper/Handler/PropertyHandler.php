<?php

namespace TimeMachine\ICal\Dumper\Handler;

use TimeMachine\ICal\Model\ObjectInterface;
use TimeMachine\ICal\Dumper\Formatter\FormatterInterface;
use TimeMachine\ICal\Model\Property;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class PropertyHandler implements HandlerInterface
{
    /**
     * {@inheritdoc}
     */
    public function open(ObjectInterface $object, FormatterInterface $formatter)
    {
        return $formatter->property($object->getName(), $object->getValue());
    }

    /**
     * {@inheritdoc}
     */
    public function close(ObjectInterface $object, FormatterInterface $formatter)
    {
        return $formatter->feed();
    }

    /**
     * {@inheritdoc}
     */
    public function supports(ObjectInterface $object)
    {
        return $object instanceof Property;
    }
}
