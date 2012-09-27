<?php

namespace Jfsimon\Icalendar\Domain\Model;

use Jfsimon\Icalendar\Domain\Collection\ComponentCollection;

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
     * @param Component $component
     */
    public function add($child)
    {
        if ($child instanceof Component) {
            $this->components[] = $child;
        }

        throw new \InvalidArgumentException();
    }

    /**
     * @return ComponentCollection
     */
    public function getComponents()
    {
        return $this->components;
    }
}
