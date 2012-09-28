<?php

namespace TimeMachine\ICal\Tests\Parser\Builder;

use TimeMachine\ICal\Parser\Tokenizer\InstructionTokenizer;
use TimeMachine\ICal\Parser\Token;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class PrefixedTokenizerTest extends \PHPUnit_Framework_TestCase
{
    public function testSuccess()
    {
        $tokenizer = new InstructionTokenizer('begin', Token::BEGIN);
        $content = 'begin:vcalendar';
        $tokens = array(new Token(Token::BEGIN, 'vcalendar'));
        $this->assertEquals($tokens, $tokenizer->buildTokens($content));
    }

    public function testError()
    {
        $tokenizer = new InstructionTokenizer('begin', Token::BEGIN);
        $content = 'dstart:vcalendar';
        $this->setExpectedException('\TimeMachine\ICal\Exception\TokenizerException');
        $tokenizer->buildTokens($content);
    }
}
