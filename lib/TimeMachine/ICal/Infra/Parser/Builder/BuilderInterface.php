<?php

namespace TimeMachine\ICal\Infra\Parser\Builder;

use TimeMachine\ICal\Infra\Parser\Token;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
interface BuilderInterface
{
    function add(Token $token);
    function build();
}
