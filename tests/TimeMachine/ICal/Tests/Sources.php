<?php

namespace TimeMachine\ICal\Tests;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class Sources
{
    public static function vevent()
    {
        return <<<EOF
BEGIN:VEVENT
DTSTART:20010714T170000Z
DTEND:20010715T035959Z
SUMMARY:Bastille Day Party
ATTACH;FMTTYPE=image/jpeg:http://domain.com/images/bastille.jpg
END:VEVENT

EOF;
    }
}
