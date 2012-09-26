<?php

namespace Jfsimon\Icalendar\Model\Bag;

use Jfsimon\Icalendar\Model\Parameter;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class ParameterBag extends AbstractBag
{
    /**
     * @param Parameter $parameter
     */
    public function add(Parameter $parameter)
    {
        $this->children[] = $parameter;
    }
}
