<?php

namespace Jfsimon\ICalendar\Domain\Model;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
abstract class AbstractObject implements ObjectInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = strtoupper($name);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }
}
