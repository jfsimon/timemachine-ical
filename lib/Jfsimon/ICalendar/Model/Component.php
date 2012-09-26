<?php

namespace Jfsimon\Icalendar\Model;

use Jfsimon\Icalendar\Model\Bag\ComponentBag;
use Jfsimon\Icalendar\Model\Bag\PropertyBag;
use Jfsimon\Icalendar\Model\Bag\ParameterBag;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class Component extends AbstractObject
{
    /**
     * @var ComponentBag
     */
    private $components;

    /**
     * @var PropertyBag
     */
    private $properties;

    /**
     * @var ParameterBag
     */
    private $parameters;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        parent::__construct($name);
        $this->components = new ComponentBag();
        $this->properties = new PropertyBag();
        $this->parameters = new ParameterBag();
    }

    /**
     * @param mixed $child
     *
     * @throws \InvalidArgumentException
     */
    public function add($child)
    {
        switch (true) {
            case $child instanceof Component:
                $this->components->add($child);
                break;

            case $child instanceof Property:
                $this->properties->add($child);
                break;

            case $child instanceof Parameter:
                $this->parameters->add($child);
                break;

            case is_array($child) || $child instanceof \Traversable:
                foreach ($child as $subChild) {
                    $this->add($subChild);
                }

                return;
        }

        throw new \InvalidArgumentException();
    }

    /**
     * @return ComponentBag
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * @return ParameterBag
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @return PropertyBag
     */
    public function getProperties()
    {
        return $this->properties;
    }
}
