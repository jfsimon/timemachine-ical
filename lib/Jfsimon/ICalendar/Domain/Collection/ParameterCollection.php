<?php

namespace Jfsimon\Icalendar\Domain\Collection;

use Jfsimon\Icalendar\Domain\Model\Parameter;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class ParameterCollection extends AbstractCollection
{
    /**
     * @param Parameter $parameter
     */
    public function add(Parameter $parameter)
    {
        $this->children[] = $parameter;
    }
}
