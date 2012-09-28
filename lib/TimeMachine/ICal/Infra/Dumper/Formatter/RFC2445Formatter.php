<?php

namespace TimeMachine\ICal\Infra\Dumper\Formatter;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class RFC2445Formatter implements FormatterInterface
{
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
        return $name.':'.$name.implode('', $parameters);
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
}
