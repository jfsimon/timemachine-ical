<?php

namespace TimeMachine\ICal\Parser\Builder;

use TimeMachine\ICal\Parser\Token;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
interface BuilderInterface
{
    function add(Token $token);
    function build();
}
