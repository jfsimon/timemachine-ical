<?php

namespace Jfsimon\ICalendar\Domain\Service;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
interface ParserInterface
{
    /**
     * @param string $content
     *
     * @return \Jfsimon\ICalendar\Domain\Model\Document
     */
    function parse($content);
}
