<?php

namespace TimeMachine\ICal\Domain\Collection;

use TimeMachine\ICal\Domain\Model\Parameter;

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
