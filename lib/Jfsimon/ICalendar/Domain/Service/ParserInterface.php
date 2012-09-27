<?php

namespace Jfsimon\Icalendar\Domain\Service;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
interface ParserInterface
{
    /**
     * @param string $content
     *
     * @return \Jfsimon\Icalendar\Domain\Model\Document
     */
    function parse($content);
}
