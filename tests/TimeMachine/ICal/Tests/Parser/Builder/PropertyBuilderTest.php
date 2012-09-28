<?php

namespace TimeMachine\ICal\Tests\Parser\Builder;

use TimeMachine\ICal\Model\Property;
use TimeMachine\ICal\Model\Parameter;
use TimeMachine\ICal\Parser\Builder\PropertyBuilder;
use TimeMachine\ICal\Parser\Token;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class PropertyBuilderTest extends AbstractBuilderTest
{
    public function testWithValue()
    {
        $dstart = new Property('DSTART');
        $builder = new PropertyBuilder($this->buildDocumentBuilder(), clone $dstart);
        $dstart->setValue('19970714T170000Z');
        $tokens = array(new Token(Token::VALUE, '19970714T170000Z'));

        $this->assertEquals($dstart, $this->build($builder, $tokens));
    }

    public function testWithParameter()
    {
        $attach = new Property('ATTACH');
        $builder = new PropertyBuilder($this->buildDocumentBuilder(), clone $attach);
        $attach->add($fmtype = new Parameter('FMTTYPE'));
        $fmtype->setValue('image/jpeg:http://domain.com/images/bastille.jpg');
        $tokens = array(new Token(Token::PARAMETER, 'FMTTYPE'));

        $this->assertEquals($attach, $this->build($builder, $tokens));
    }

    public function testWithValueAndParameter()
    {
        $xprop = new Property('X-PROP');
        $builder = new PropertyBuilder($this->buildDocumentBuilder(), clone $xprop);
        $xprop->setValue('X-PROP-VAL');
        $xprop->add($xparam = new Parameter('X-PARAM'));
        $xparam->setValue('X-PARAM-VAL');
        $tokens = array(new Token(Token::VALUE, 'X-PROP-VAL'), new Token(Token::PARAMETER, 'X-PARAM'), new Token(Token::VALUE, 'X-PARAM-VAL'));

        $this->assertEquals($xprop, $this->build($builder, $tokens));
    }
}
