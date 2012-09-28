<?php

namespace TimeMachine\ICal\Domain\Service;

use TimeMachine\ICal\Domain\Model\Document;

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
