<?php

namespace TimeMachine\ICal\Service;

use TimeMachine\ICal\Model\Document;

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
