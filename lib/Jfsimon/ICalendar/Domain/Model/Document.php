<?php

namespace Jfsimon\Icalendar\Domain\Model;

use Jfsimon\Icalendar\Domain\Collection\ComponentCollection;
use Jfsimon\ICalendar\Exception\InvalidChildException;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class Document
{
    /**
     * @var ComponentCollection
     */
    private $components;

    /**
     * {@inheritdoc}
     */
    public function add($child)
    {
        if ($child instanceof Component) {
            $this->components[] = $child;
        }

        throw new InvalidChildException('Component', $child);
    }

    /**
     * @return ComponentCollection
     */
    public function getComponents()
    {
        return $this->components;
    }
}
