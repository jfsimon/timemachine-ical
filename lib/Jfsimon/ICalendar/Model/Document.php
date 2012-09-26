<?php

namespace Jfsimon\Icalendar\Model;

use Jfsimon\Icalendar\Model\Bag\ComponentBag;
use Jfsimon\Icalendar\Model\Bag\PropertyBag;
use Jfsimon\Icalendar\Model\Bag\ParameterBag;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class Document
{
    /**
     * @var ComponentBag
     */
    private $components;

    /**
     * @param mixed $child
     *
     * @throws \InvalidArgumentException
     */
    public function add(Component $component)
    {
        $this->components[] = $component;
    }
}
