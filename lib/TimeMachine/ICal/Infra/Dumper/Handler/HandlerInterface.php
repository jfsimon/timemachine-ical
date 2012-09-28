<?php

namespace TimeMachine\ICal\Infra\Dumper\Handler;

use TimeMachine\ICal\Domain\Model\ObjectInterface;
use TimeMachine\ICal\Infra\Dumper\Formatter\FormatterInterface;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
interface HandlerInterface
{
    /**
     * @param ObjectInterface    $object
     * @param FormatterInterface $formatter
     *
     * @return string
     */
    function open(ObjectInterface $object, FormatterInterface $formatter);

    /**
     * @param ObjectInterface    $object
     * @param FormatterInterface $formatter
     *
     * @return string
     */
    function close(ObjectInterface $object, FormatterInterface $formatter);

    /**
     * @param ObjectInterface $object
     *
     * @return bool
     */
    function supports(ObjectInterface $object);
}
