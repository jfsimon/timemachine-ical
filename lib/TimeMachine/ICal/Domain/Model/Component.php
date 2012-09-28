<?php

namespace TimeMachine\ICal\Domain\Model;

use TimeMachine\ICal\Domain\Collection\ComponentCollection;
use TimeMachine\ICal\Domain\Collection\PropertyCollection;
use TimeMachine\ICal\Domain\Collection\ParameterCollection;
use TimeMachine\ICal\Domain\Exception\InvalidChildException;

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
     * {@inheritdoc}
     */
    public function getChildren()
    {
        return array_merge($this->components, $this->properties);
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
