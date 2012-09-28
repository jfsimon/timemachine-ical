<?php

namespace TimeMachine\ICal\Collection;

use TimeMachine\ICal\Model\Component;

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
