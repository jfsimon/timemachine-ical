<?php

namespace Jfsimon\Icalendar\Model\Bag;

use Jfsimon\Icalendar\Model\Component;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class ComponentBag extends AbstractBag
{
    /**
     * @param Component $component
     */
    public function add(Component $component)
    {
        $this->children[] = $component;
    }
}
