<?php

namespace Jfsimon\Icalendar\Domain\Model;

use Jfsimon\Icalendar\Domain\Collection\ComponentCollection;
use Jfsimon\Icalendar\Domain\Collection\PropertyCollection;
use Jfsimon\Icalendar\Domain\Collection\ParameterCollection;
use Jfsimon\ICalendar\Exception\InvalidChildException;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class Component extends AbstractObject
{
    /**
     * @var ComponentCollection
     */
    private $components;

    /**
     * @var PropertyCollection
     */
    private $properties;

    /**
     * @var ParameterCollection
     */
    private $parameters;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        parent::__construct($name);
        $this->components = new ComponentCollection();
        $this->properties = new PropertyCollection();
        $this->parameters = new ParameterCollection();
    }

    /**
     * {@inheritdoc}
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

        throw new InvalidChildException('Component, Property or Parameter', $child);
    }

    /**
     * @return ComponentCollection
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * @return ParameterCollection
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @return PropertyCollection
     */
    public function getProperties()
    {
        return $this->properties;
    }
}
