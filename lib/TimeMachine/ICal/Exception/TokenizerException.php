<?php

namespace TimeMachine\ICal\Exception;

/**
 * Tokenizer exception.
 *
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class TokenizerException extends \InvalidArgumentException
{
    /**
     * Tried to tokenize unsupported content.
     *
     * @param string $content
     *
     * @return TokenizerException
     */
    public static function unsupportedContent($content)
    {
        return new self('Could not tokenize content: "'.$content.'".');
    }
}
