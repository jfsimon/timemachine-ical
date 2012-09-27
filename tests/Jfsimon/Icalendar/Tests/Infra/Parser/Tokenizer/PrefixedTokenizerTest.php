<?php

namespace Jfsimon\ICalendar\Tests\Infra\Parser\Builder;

use Jfsimon\ICalendar\Infra\Parser\Tokenizer\PrefixedTokenizer;
use Jfsimon\ICalendar\Infra\Parser\Token;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class PrefixedTokenizerTest extends \PHPUnit_Framework_TestCase
{
    public function test1()
    {
        $tokenizer = new PrefixedTokenizer('begin:', Token::BEGIN);
        $tokens = array(new Token(Token::BEGIN, 'vcalendar'));
        $content = 'begin:vcalendar';
        $this->assertEquals($tokens, $tokenizer->buildTokens($content));
    }

    public function test2()
    {
        $tokenizer = new PrefixedTokenizer('begin:', Token::BEGIN);
        $content = 'dstart:vcalendar';
        $this->setExpectedException('\InvalidArgumentException');
        $tokenizer->buildTokens($content);
    }
}
