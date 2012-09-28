<?php

namespace TimeMachine\ICal\Infra\Dumper\Handler;

use TimeMachine\ICal\Domain\Model\ObjectInterface;
use TimeMachine\ICal\Infra\Dumper\Formatter\FormatterInterface;
use TimeMachine\ICal\Domain\Model\Component;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class DocumentHandler implements HandlerInterface
{
    /**
     * {@inheritdoc}
     */
    public function open(ObjectInterface $object, FormatterInterface $formatter)
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    public function close(ObjectInterface $object, FormatterInterface $formatter)
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    public function supports(ObjectInterface $object)
    {
        return $object instanceof Component;
    }
}
