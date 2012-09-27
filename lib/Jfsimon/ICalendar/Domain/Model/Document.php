<?php

namespace Jfsimon\ICalendar\Domain\Model;

use Jfsimon\ICalendar\Domain\Collection\ComponentCollection;
use Jfsimon\ICalendar\Domain\Exception\InvalidChildException;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class Document
{
    /**
     * @var ComponentCollection
     */
    private $components;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->components = new ComponentCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function add($child)
    {
        if ($child instanceof Component) {
            $this->components->add($child);

            return;
        }

        throw new InvalidChildException('Component', $child);
    }

    /**
     * @return ComponentCollection
     */
    public function getComponents()
    {
        return $this->components;
    }
}
