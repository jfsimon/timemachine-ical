<?php

namespace TimeMachine\ICal\Dumper\Formatter;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
interface FormatterInterface
{
    /**
     * @param string $name
     *
     * @return string
     */
    function begin($name);

    /**
     * @param string $name
     *
     * @return string
     */
    function end($name);

    /**
     * @param string $name
     * @param string $value
     * @param array  $parameters
     *
     * @return string
     */
    function property($name, $value, array $parameters = array());

    /**
     * @param string $name
     * @param string $value
     *
     * @return string
     */
    function parameter($name, $value);

    /**
     * @param string $value
     * @param int    $level
     *
     * @return string
     */
    function indent($value, $level = 1);

    /**
     * @return string
     */
    function feed();
}
