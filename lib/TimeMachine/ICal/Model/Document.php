<?php

namespace TimeMachine\ICal\Model;

use TimeMachine\ICal\Collection\ComponentCollection;
use TimeMachine\ICal\Exception\ModelException;

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

        throw ModelException::unsupportedChild('Component', $child);
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
