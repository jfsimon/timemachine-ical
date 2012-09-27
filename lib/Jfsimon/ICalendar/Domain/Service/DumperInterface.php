<?php

namespace Jfsimon\Icalendar\Domain\Service;

use Jfsimon\Icalendar\Domain\Model\Document;

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
