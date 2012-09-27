<?php

namespace Jfsimon\Icalendar\Domain\Collection;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
abstract class AbstractCollection implements \IteratorAggregate
{
    /**
     * @var array
     */
    protected $children;

    /**
     * @param array $children
     */
    public function __construct()
    {
        $this->children = array();
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
