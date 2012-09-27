<?php

namespace Jfsimon\ICalendar\Infra\Parser\Builder;

use Jfsimon\ICalendar\Infra\Parser\Token;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
interface BuilderInterface
{
    function add(Token $token);
    function build();
}
