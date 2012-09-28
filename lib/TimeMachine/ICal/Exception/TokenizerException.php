<?php

namespace TimeMachine\ICal\Exception;

use TimeMachine\ICal\Parser\Tokenizer\TokenizerInterface;

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
     * @param \TimeMachine\ICal\Parser\Tokenizer\TokenizerInterface $tokenizer
     * @param string                                                $content
     *
     * @return TokenizerException
     */
    public static function unsupportedContent(TokenizerInterface $tokenizer, $content)
    {
        return new self('Could not tokenize content: "'.$content.'" with "'.get_class($tokenizer).'".');
    }
}
