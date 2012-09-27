<?php

namespace Jfsimon\ICalendar\Domain\Collection;

use Jfsimon\ICalendar\Domain\Exception\EmptyCollectionException;

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
     * @return \Jfsimon\ICalendar\Domain\Model\ObjectInterface
     */
    public function first()
    {
        if (0 === count($this->children)) {
            throw new EmptyCollectionException();
        }

        return $this->children[0];
    }
}
