<?php

namespace TimeMachine\ICal\Domain\Service;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
interface ParserInterface
{
    /**
     * @param string $content
     *
     * @return \TimeMachine\ICal\Domain\Model\Document
     */
    function parse($content);
}
