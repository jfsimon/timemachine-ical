<?php

namespace TimeMachine\ICal\Parser\Tokenizer;

use TimeMachine\ICal\Parser\Token;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class RFC2445Tokenizer implements TokenizerInterface
{
    /**
     * @var TokenizerChain
     */
    private $innerTokenizer;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->innerTokenizer = new TokenizerChain(array(
            new InstructionTokenizer('begin', Token::BEGIN),
            new InstructionTokenizer('end', Token::END),
            new PropertyTokenizer(':', ';', new ValueTokenizer(), new ParameterTokenizer('=', new ValueTokenizer())),
            new ParameterTokenizer('=', new ValueTokenizer()),
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function buildTokens($content)
    {
        return $this->innerTokenizer->buildTokens($content);
    }
}
