<?php

namespace Jfsimon\Icalendar\Model\Bag;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
abstract class AbstractBag implements \IteratorAggregate
{
    /**
     * @var array
     */
    protected $children;

    /**
     * @param array $children
     */
    public function __construct(array $children = array())
    {
        $this->children = array();
        foreach ($children as $child) {
            $this->add($child);
        }
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->children);
    }

    /**
     * @param string $name
     *
     * @return \ArrayIterator
     */
    public function find($name)
    {
        $children = array();
        foreach ($this->children as $child) {
            if ($child->getName() === $name) {
                $children[] = $name;
            }
        }

        return new \ArrayIterator($children);
    }
}
