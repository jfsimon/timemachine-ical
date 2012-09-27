<?php

namespace Jfsimon\ICalendar\Infra\Parser\Tokenizer;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
interface TokenizerInterface
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
