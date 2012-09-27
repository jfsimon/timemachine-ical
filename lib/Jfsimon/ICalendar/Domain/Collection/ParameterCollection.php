<?php

namespace Jfsimon\ICalendar\Domain\Collection;

use Jfsimon\ICalendar\Domain\Model\Parameter;

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
