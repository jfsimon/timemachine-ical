<?php

namespace TimeMachine\ICal\Dumper;

use TimeMachine\ICal\Dumper\Formatter\FormatterInterface;
use TimeMachine\ICal\Model\ObjectInterface;
use TimeMachine\ICal\Dumper\Handler;
use TimeMachine\ICal\Exception\DumperException;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class Dumper
{
    /**
     * @var FormatterInterface
     */
    private $formatter;

    /**
     * @var array
     */
    private $handlers;

    /**
     * @param FormatterInterface $formatter
     */
    public function __construct(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
        $this->handlers = array(
            new Handler\DocumentHandler(),
            new Handler\ComponentHandler(),
            new Handler\PropertyHandler(),
            new Handler\ParameterHandler(),
        );
    }

    /**
     * @param ObjectInterface $object
     *
     * @return string
     */
    public function dump(ObjectInterface $object)
    {
        $handler = $this->findHandler($object);
        $content = $handler->open($object, $this->formatter);

        foreach ($object->getChildren() as $child) {
            $content.= $this->dump($child);
        }

        return $content.$handler->close($object, $this->formatter);
    }

    /**
     * @param ObjectInterface $object
     *
     * @return Handler\HandlerInterface
     *
     * @throws \InvalidArgumentException
     */
    private function findHandler(ObjectInterface $object)
    {
        foreach ($this->handlers as $handler) {
            if ($handler->supports($object)) {
                return $handler;
            }
        }

        throw DumperException::unsupportedObject($object);
    }
}
