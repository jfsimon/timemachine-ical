<?php

namespace TimeMachine\ICal\Tests\Parser\Builder;

use TimeMachine\ICal\Parser\Tokenizer\InstructionTokenizer;
use TimeMachine\ICal\Parser\Tokenizer\ParameterTokenizer;
use TimeMachine\ICal\Parser\Tokenizer\PropertyTokenizer;
use TimeMachine\ICal\Parser\Tokenizer\TokenizerChain;
use TimeMachine\ICal\Parser\Tokenizer\ValueTokenizer;
use TimeMachine\ICal\Parser\Token;

/**
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 */
class TokenizerChainTest extends \PHPUnit_Framework_TestCase
{
    public function testInstructionsAndProperty()
    {
        $tokenizer = new TokenizerChain(array(
            new InstructionTokenizer('begin', Token::BEGIN),
            new PropertyTokenizer(':', ';', new ValueTokenizer(), new ParameterTokenizer('=', new ValueTokenizer())),
        ));

        $this->assertEquals(
            array(new Token(Token::BEGIN, 'VEVENT')),
            $tokenizer->buildTokens('BEGIN:VEVENT')
        );

        $this->assertEquals(
            array(new Token(Token::PROPERTY, 'DTSTART'), new Token(Token::VALUE, '20010714T170000Z')),
            $tokenizer->buildTokens('DTSTART:20010714T170000Z')
        );
    }

    public function testPropertyAndInstructions()
    {
        $tokenizer = new TokenizerChain(array(
            new PropertyTokenizer(':', ';', new ValueTokenizer(), new ParameterTokenizer('=', new ValueTokenizer())),
            new InstructionTokenizer('begin', Token::BEGIN),
        ));

        $this->assertEquals(
            array(new Token(Token::PROPERTY, 'BEGIN'), new Token(Token::VALUE, 'VEVENT')),
            $tokenizer->buildTokens('BEGIN:VEVENT')
        );

        $this->assertEquals(
            array(new Token(Token::PROPERTY, 'DTSTART'), new Token(Token::VALUE, '20010714T170000Z')),
            $tokenizer->buildTokens('DTSTART:20010714T170000Z')
        );
    }
}
