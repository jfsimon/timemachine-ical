<?php

namespace TimeMachine\ICal\Service;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
interface ParserInterface
{
    /**
     * @param string $content
     *
     * @return \TimeMachine\ICal\Model\Document
     */
    function parse($content);
}
