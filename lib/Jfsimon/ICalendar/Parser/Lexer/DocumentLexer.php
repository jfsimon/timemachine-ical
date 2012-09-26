<?php

namespace Jfsimon\ICalendar\Parser\Lexer;

use Jfsimon\ICalendar\Parser\Token;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class DocumentLexer implements LexerInterface
{
    private $propertySeparator;
    private $propertyValueSeparator;
    private $parameterSeparator;
    private $innerLexer;

    public function __construct($propertySeparator = ':', $propertyValueSeparator = ';', $parameterSeparator = '=')
    {
        $this->propertySeparator = $propertySeparator;
        $this->propertyValueSeparator = $propertyValueSeparator;
        $this->parameterSeparator = $parameterSeparator;

        $propertyValueLexer = new LexerChain();
        $propertyValueLexer->addLexer(new ParameterLexer($parameterSeparator, new ValueLexer()));
        $propertyValueLexer->addLexer(new ValueLexer());

        $this->innerLexer = new LexerChain();
        $this->innerLexer->addLexer(new PrefixedLexer('begin:', Token::BEGIN));
        $this->innerLexer->addLexer(new PrefixedLexer('end:', Token::END));
        $this->innerLexer->addLexer(new PrefixedLexer('\s+', Token::VALUE));
        $this->innerLexer->addLexer(new PropertyLexer($this->propertySeparator, $this->propertyValueSeparator, $propertyValueLexer));
        $this->innerLexer->addLexer(new ParameterLexer($this->parameterSeparator, new ValueLexer()));
    }

    /**
     * {@inheritdoc}
     */
    public function buildTokens($content)
    {
        return $this->innerLexer->buildTokens($content);
    }
}
