<?php

namespace TimeMachine\ICal\Tests\Infra\Parser\Builder;

use TimeMachine\ICal\Domain\Model\ObjectInterface;
use TimeMachine\ICal\Domain\Model\Document;
use TimeMachine\ICal\Infra\Parser\Builder\BuilderInterface;
use TimeMachine\ICal\Infra\Parser\Builder\DocumentBuilder;

abstract class AbstractBuilderTest extends \PHPUnit_Framework_TestCase
{
    protected function build(BuilderInterface $builder, array $tokens)
    {
        foreach ($tokens as $token) {
            $builder = $builder->add($token);
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
