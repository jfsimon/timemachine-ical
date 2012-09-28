<?php

namespace TimeMachine\ICal\Dumper\Handler;

use TimeMachine\ICal\Model\ObjectInterface;
use TimeMachine\ICal\Dumper\Formatter\FormatterInterface;
use TimeMachine\ICal\Model\Component;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class ComponentHandler implements HandlerInterface
{
    /**
     * {@inheritdoc}
     */
    public function open(ObjectInterface $object, FormatterInterface $formatter)
    {
        return $formatter->begin($object->getName()).$formatter->feed();
    }

    /**
     * {@inheritdoc}
     */
    public function close(ObjectInterface $object, FormatterInterface $formatter)
    {
        return $formatter->end($object->getName()).$formatter->feed();
    }

    /**
     * {@inheritdoc}
     */
    public function supports(ObjectInterface $object)
    {
        return $object instanceof Component;
    }
}
