<?php

namespace TimeMachine\ICal\Collection;

use TimeMachine\ICal\Model\Parameter;

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
