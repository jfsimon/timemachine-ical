<?php

namespace TimeMachine\ICal\Parser\Tokenizer;

use TimeMachine\ICal\Parser\Token;
use TimeMachine\ICal\Exception\TokenizerException;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class InstructionTokenizer implements TokenizerInterface
{
    /**
     * @var string
     */
    private $instruction;

    /**
     * @var int
     */
    private $tokenType;

    /**
     * @param string $instruction
     * @param int    $tokenType
     */
    public function __construct($instruction, $tokenType)
    {
        $this->instruction = $instruction;
        $this->tokenType = $tokenType;
    }

    /**
     * {@inheritdoc}
     */
    public function buildTokens($content)
    {
        if (preg_match('/^'.$this->instruction.':(.*)$/i', $content, $matches)) {
            return array(new Token($this->tokenType, $matches[1]));
        }

        throw TokenizerException::unsupportedContent($content);
    }
}
