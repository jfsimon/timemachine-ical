<?php

namespace Jfsimon\ICalendar\Infra\Parser\Tokenizer;

use Jfsimon\ICalendar\Infra\Parser\Token;

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
        $propertyValueTokenizer = new TokenizerChain();
        $propertyValueTokenizer->addTokenizer(new ParameterTokenizer('=', new ValueTokenizer()));
        $propertyValueTokenizer->addTokenizer(new ValueTokenizer());

        $this->innerTokenizer = new TokenizerChain();
        $this->innerTokenizer->addTokenizer(new PrefixedTokenizer('begin:', Token::BEGIN));
        $this->innerTokenizer->addTokenizer(new PrefixedTokenizer('end:', Token::END));
        $this->innerTokenizer->addTokenizer(new PrefixedTokenizer('\s+', Token::VALUE));
        $this->innerTokenizer->addTokenizer(new PropertyTokenizer(':', ';', $propertyValueTokenizer));
        $this->innerTokenizer->addTokenizer(new ParameterTokenizer('=', new ValueTokenizer()));
    }

    /**
     * {@inheritdoc}
     */
    public function buildTokens($content)
    {
        return $this->innerTokenizer->buildTokens($content);
    }
}
