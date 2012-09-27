<?php

namespace Jfsimon\ICalendar\Domain\Service;

use Jfsimon\ICalendar\Domain\Model\Document;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
interface DumperInterface
{
    /**
     * @param Document $document
     *
     * @return string
     */
    function parse(Document $document);
}
