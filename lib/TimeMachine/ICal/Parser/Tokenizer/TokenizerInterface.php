<?php

namespace TimeMachine\ICal\Parser\Tokenizer;

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
     * @throws \TimeMachine\ICal\Exception\TokenizerException;;
     */
    function buildTokens($content);
}
