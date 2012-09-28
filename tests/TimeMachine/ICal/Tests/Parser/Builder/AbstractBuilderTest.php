<?php

namespace TimeMachine\ICal\Tests\Parser\Builder;

use TimeMachine\ICal\Model\ObjectInterface;
use TimeMachine\ICal\Model\Document;
use TimeMachine\ICal\Parser\Builder\BuilderInterface;
use TimeMachine\ICal\Parser\Builder\DocumentBuilder;

abstract class AbstractBuilderTest extends \PHPUnit_Framework_TestCase
{
    protected function build(BuilderInterface $builder, array $tokens)
    {
        $cursor = $builder;
        foreach ($tokens as $token) {
            $cursor = $cursor->add($token);
        }

        return $builder->build();
    }

    /**
     * @return DocumentBuilder
     */
    protected function buildDocumentBuilder()
    {
        return new DocumentBuilder(new Document());
    }
}
