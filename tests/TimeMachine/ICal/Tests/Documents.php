<?php

namespace TimeMachine\ICal\Tests;

use TimeMachine\ICal\Model\Document;
use TimeMachine\ICal\Model\Component;
use TimeMachine\ICal\Model\Property;
use TimeMachine\ICal\Model\Parameter;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class Documents
{
    public static function vevent()
    {
        $document = new Document();
        $document->add($vevent = new Component('VEVENT'));
        $vevent->add(new Property('DTSTART', '20010714T170000Z'));
        $vevent->add(new Property('DTEND', '20010715T035959Z'));
        $vevent->add(new Property('SUMMARY', 'Bastille Day Party'));
        $vevent->add($attach = new Property('ATTACH'));
        $attach->add(new Parameter('FMTTYPE', 'image/jpeg:http://domain.com/images/bastille.jpg'));

        return $document;
    }
}
