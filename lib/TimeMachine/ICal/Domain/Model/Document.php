<?php

namespace TimeMachine\ICal\Domain\Model;

use TimeMachine\ICal\Domain\Collection\ComponentCollection;
use TimeMachine\ICal\Domain\Exception\InvalidChildException;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class Document implements ObjectInterface
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
     * {@inheritdoc}
     */
    public function getChildren()
    {
        return $this->components;
    }

    /**
     * @return ComponentCollection
     */
    public function getComponents()
    {
        return $this->components;
    }
}
