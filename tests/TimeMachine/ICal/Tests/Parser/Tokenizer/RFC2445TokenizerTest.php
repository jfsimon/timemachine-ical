<?php

namespace TimeMachine\ICal\Tests\Parser\Builder;

use TimeMachine\ICal\Parser\Tokenizer\RFC2445Tokenizer;
use TimeMachine\ICal\Parser\Token;

/**
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 */
class RFC2445TokenizerTest extends \PHPUnit_Framework_TestCase
{
    public function testVEvent()
    {
        $tokenizer = new RFC2445Tokenizer();

        $this->assertEquals(
            array(new Token(Token::BEGIN, 'VEVENT')),
            $tokenizer->buildTokens('BEGIN:VEVENT')
        );

        $this->assertEquals(
            array(
                new Token(Token::PROPERTY, 'DTSTART'),
                new Token(Token::VALUE, '20010714T170000Z'),
            ),
            $tokenizer->buildTokens('DTSTART:20010714T170000Z')
        );

        $this->assertEquals(
            array(
                new Token(Token::PROPERTY, 'ATTACH'),
                new Token(Token::PARAMETER, 'FMTTYPE'),
                new Token(Token::VALUE, 'image/jpeg:http://domain.com/images/bastille.jpg'),
            ),
            $tokenizer->buildTokens('ATTACH;FMTTYPE=image/jpeg:http://domain.com/images/bastille.jpg')
        );
    }
}
