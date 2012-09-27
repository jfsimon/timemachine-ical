<?php

namespace Jfsimon\Icalendar\Domain\Collection;

use Jfsimon\Icalendar\Domain\Model\Component;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class ComponentCollection extends AbstractCollection
{
    /**
     * @param Component $component
     */
    public function add(Component $component)
    {
        $this->children[] = $component;
    }
}
