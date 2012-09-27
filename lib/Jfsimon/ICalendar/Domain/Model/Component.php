<?php

namespace Jfsimon\ICalendar\Domain\Model;

use Jfsimon\ICalendar\Domain\Collection\ComponentCollection;
use Jfsimon\ICalendar\Domain\Collection\PropertyCollection;
use Jfsimon\ICalendar\Domain\Collection\ParameterCollection;
use Jfsimon\ICalendar\Domain\Exception\InvalidChildException;

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
     * @param string $name
     */
    public function __construct($name)
    {
        parent::__construct($name);
        $this->components = new ComponentCollection();
        $this->properties = new PropertyCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function add($child)
    {
        switch (true) {
            case $child instanceof Component:
                $this->components->add($child);

                return;

            case $child instanceof Property:
                $this->properties->add($child);

                return;

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
     * @return PropertyCollection
     */
    public function getProperties()
    {
        return $this->properties;
    }
}
