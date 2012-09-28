<?php

namespace TimeMachine\ICal\Parser\Tokenizer;

use TimeMachine\ICal\Parser\Token;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class ValueTokenizer implements TokenizerInterface
{
    /**
     * {@inheritdoc}
     */
    public function buildTokens($content)
    {
        return array(new Token(Token::VALUE, $content));
    }
}
