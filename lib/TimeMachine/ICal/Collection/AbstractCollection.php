<?php

namespace TimeMachine\ICal\Collection;

use TimeMachine\ICal\Exception\CollectionException;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
abstract class AbstractCollection implements \IteratorAggregate, \Countable
{
    /**
     * @var array
     */
    protected $children;

    /**
     * Constructor.
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
     * @return int
     */
    public function count()
    {
        return count($this->children);
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

    /**
     * @return \TimeMachine\ICal\Model\ObjectInterface
     */
    public function first()
    {
        if (0 === count($this->children)) {
            throw CollectionException::noChild();
        }

        return $this->children[0];
    }
}
