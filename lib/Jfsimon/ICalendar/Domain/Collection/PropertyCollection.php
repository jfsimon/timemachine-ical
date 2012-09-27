<?php

namespace Jfsimon\Icalendar\Domain\Collection;

use Jfsimon\Icalendar\Domain\Model\Property;

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
