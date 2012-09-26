<?php

namespace Jfsimon\Icalendar\Model\Bag;

use Jfsimon\Icalendar\Model\Property;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class PropertyBag extends AbstractBag
{
    /**
     * @param Property $property
     */
    public function add(Property $property)
    {
        $this->children[] = $property;
    }
}
