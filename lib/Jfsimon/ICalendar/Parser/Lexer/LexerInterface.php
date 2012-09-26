<?php

namespace Jfsimon\ICalendar\Parser\Lexer;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
interface LexerInterface
{
    /**
     * @param string $content
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     */
    function buildTokens($content);
}
