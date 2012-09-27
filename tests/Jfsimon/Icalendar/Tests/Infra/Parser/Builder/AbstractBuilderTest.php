<?php

namespace Jfsimon\ICalendar\Tests\Infra\Parser\Builder;

use Jfsimon\ICalendar\Domain\Model\ObjectInterface;
use Jfsimon\ICalendar\Domain\Model\Document;
use Jfsimon\ICalendar\Infra\Parser\Builder\BuilderInterface;
use Jfsimon\ICalendar\Infra\Parser\Builder\DocumentBuilder;

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
