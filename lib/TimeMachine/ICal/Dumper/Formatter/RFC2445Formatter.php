<?php

namespace TimeMachine\ICal\Dumper\Formatter;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class RFC2445Formatter implements FormatterInterface
{
    /**
     * @var string
     */
    private $feed;

    /**
     * @param string $feed
     */
    public function __construct($feed = "\n\r")
    {
        $this->feed = $feed;
    }

    /**
     * {@inheritdoc}
     */
    public function begin($name)
    {
        return 'BEGIN:'.$name;
    }

    /**
     * {@inheritdoc}
     */
    public function end($name)
    {
        return 'END:'.$name;
    }

    /**
     * {@inheritdoc}
     */
    public function property($name, $value, array $parameters = array())
    {
        return $name.((count($parameters) > 0 || $value) ? ':' : '').$value.implode('', $parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function parameter($name, $value)
    {
        return ';'.$name.'='.$value;
    }

    /**
     * {@inheritdoc}
     */
    public function indent($value, $level = 1)
    {
        return str_repeat(' ', $level).$value;
    }

    public function feed()
    {
        return $this->feed;
    }
}
