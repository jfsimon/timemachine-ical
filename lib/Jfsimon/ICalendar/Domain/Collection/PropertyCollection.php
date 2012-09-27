<?php

namespace Jfsimon\ICalendar\Domain\Collection;

use Jfsimon\ICalendar\Domain\Model\Property;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class PropertyCollection extends AbstractCollection
{
    /**
     * @param Property $property
     */
    public function add(Property $property)
    {
        $this->children[] = $property;
    }
}
