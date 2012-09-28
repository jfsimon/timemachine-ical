<?php

namespace TimeMachine\ICal\Tests\Parser\Builder;

use TimeMachine\ICal\Parser\Tokenizer\ParameterTokenizer;
use TimeMachine\ICal\Parser\Tokenizer\ValueTokenizer;
use TimeMachine\ICal\Parser\Token;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class ParameterTokenizerTest extends \PHPUnit_Framework_TestCase
{
    public function testWithValue()
    {
        $tokenizer = new ParameterTokenizer('=', new ValueTokenizer());
        $content = 'DELEGATED-FROM=bar@example.com:mailto:foo@example.com';
        $tokens = array(new Token(Token::PARAMETER, 'DELEGATED-FROM'), new Token(Token::VALUE, 'bar@example.com:mailto:foo@example.com'));
        $this->assertEquals($tokens, $tokenizer->buildTokens($content));
    }

    public function testWithoutValue()
    {
        $tokenizer = new ParameterTokenizer('=', new ValueTokenizer());
        $content = 'PARTSTAT=';
        $tokens = array(new Token(Token::PARAMETER, 'PARTSTAT'), new Token(Token::VALUE, ''));
        $this->assertEquals($tokens, $tokenizer->buildTokens($content));
    }

    public function testWithoutName()
    {
        $tokenizer = new ParameterTokenizer('=', new ValueTokenizer());
        $content = '=REQ-PARTICIPANT';
        $this->setExpectedException('\TimeMachine\ICal\Exception\TokenizerException');
        $tokenizer->buildTokens($content);
    }

    public function testEmpty()
    {
        $tokenizer = new ParameterTokenizer('=', new ValueTokenizer());
        $content = '';
        $tokens = array();
        $this->assertEquals($tokens, $tokenizer->buildTokens($content));
    }
}
