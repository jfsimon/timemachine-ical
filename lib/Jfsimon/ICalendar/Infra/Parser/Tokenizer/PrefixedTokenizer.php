<?php

namespace Jfsimon\ICalendar\Infra\Parser\Tokenizer;

use Jfsimon\ICalendar\Infra\Parser\Token;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class PrefixedTokenizer implements TokenizerInterface
{
    /**
     * @var string
     */
    private $prefix;

    /**
     * @var int
     */
    private $type;

    /**
     * @param string $prefix
     * @param int    $type
     */
    public function __construct($prefix, $type)
    {
        $this->prefix = $prefix;
        $this->type = $type;
    }

    /**
     * {@inheritdoc}
     */
    public function buildTokens($content)
    {
        if (preg_match('/^'.$this->prefix.'(.*)$/i', $content, $matches)) {
            return array(new Token($this->type, $matches[1]));
        }

        throw new \InvalidArgumentException();
    }
}
