<?php

namespace Jfsimon\ICalendar\Parser\Builder;

use Jfsimon\ICalendar\Parser\Token;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
interface BuilderInterface
{
    function add(Token $token);
    function build();
}
