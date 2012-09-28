<?php

namespace TimeMachine\ICal\Domain\Collection;

use TimeMachine\ICal\Domain\Model\Component;

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
