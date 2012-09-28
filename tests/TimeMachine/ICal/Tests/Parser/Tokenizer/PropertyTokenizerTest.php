<?php

namespace TimeMachine\ICal\Tests\Parser\Builder;

use TimeMachine\ICal\Parser\Tokenizer\PropertyTokenizer;
use TimeMachine\ICal\Parser\Tokenizer\ParameterTokenizer;
use TimeMachine\ICal\Parser\Tokenizer\ValueTokenizer;
use TimeMachine\ICal\Parser\Token;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class PropertyTokenizerTest extends \PHPUnit_Framework_TestCase
{
    public function testWithoutValueNorParameter()
    {
        $tokenizer = new PropertyTokenizer(':', ';', new ValueTokenizer(), new ParameterTokenizer('=', new ValueTokenizer()));
        $content = 'DSTART';
        $tokens = array(new Token(Token::PROPERTY, 'DSTART'));
        $this->assertEquals($tokens, $tokenizer->buildTokens($content));
    }

    public function testWithValue()
    {
        $tokenizer = new PropertyTokenizer(':', ';', new ValueTokenizer(), new ParameterTokenizer('=', new ValueTokenizer()));
        $content = 'DSTART:20010714T170000Z';
        $tokens = array(new Token(Token::PROPERTY, 'DSTART'), new Token(Token::VALUE, '20010714T170000Z'));
        $this->assertEquals($tokens, $tokenizer->buildTokens($content));
    }

    public function testWithParameter()
    {
        $tokenizer = new PropertyTokenizer(':', ';', new ValueTokenizer(), new ParameterTokenizer('=', new ValueTokenizer()));
        $content = 'ATTACH;FMTTYPE=image/jpeg:http://domain.com/images/bastille.jpg';
        $tokens = array(
            new Token(Token::PROPERTY, 'ATTACH'),
            new Token(Token::PARAMETER, 'FMTTYPE'),
            new Token(Token::VALUE, 'image/jpeg:http://domain.com/images/bastille.jpg'),
        );
        $this->assertEquals($tokens, $tokenizer->buildTokens($content));
    }

    public function testWithManyParameters()
    {
        $tokenizer = new PropertyTokenizer(':', ';', new ValueTokenizer(), new ParameterTokenizer('=', new ValueTokenizer()));
        $content = 'ATTENDEE;PARTSTAT=TENTATIVE;ROLE=REQ-PARTICIPANT;DELEGATED-FROM=bar@example.com:mailto:foo@example.com';
        $tokens = array(
            new Token(Token::PROPERTY, 'ATTENDEE'),
            new Token(Token::PARAMETER, 'PARTSTAT'),
            new Token(Token::VALUE, 'TENTATIVE'),
            new Token(Token::PARAMETER, 'ROLE'),
            new Token(Token::VALUE, 'REQ-PARTICIPANT'),
            new Token(Token::PARAMETER, 'DELEGATED-FROM'),
            new Token(Token::VALUE, 'bar@example.com:mailto:foo@example.com'),
        );
        $this->assertEquals($tokens, $tokenizer->buildTokens($content));
    }

    public function testWithParameterAndValue()
    {
        $tokenizer = new PropertyTokenizer(':', ';', new ValueTokenizer(), new ParameterTokenizer('=', new ValueTokenizer()));
        $content = 'X-PROP:X-PROP-VAL;X-PARAM=X-PARAM-VAL';
        $tokens = array(
            new Token(Token::PROPERTY, 'X-PROP'),
            new Token(Token::VALUE, 'X-PROP-VAL'),
            new Token(Token::PARAMETER, 'X-PARAM'),
            new Token(Token::VALUE, 'X-PARAM-VAL'),
        );
        $this->assertEquals($tokens, $tokenizer->buildTokens($content));
    }
}
