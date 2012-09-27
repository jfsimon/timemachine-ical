ICalendar PHP library
=====================

How to:
-------

_Use these commands from the package root directory._

- Install using composer: `composer.phar install`
- Start tests with make: `make test`

Basic usage:
------------

_See RFC2445: http://www.ietf.org/rfc/rfc2445.txt._

- Parse standard iCal content:

        use Jfsimon\Icalendar\Icalendar;
        use Jfsimon\Icalendar\Infra\Parser\Tokenizer\RFC2445Tokenizer;

        ICalendar::parse($content, new RFC2445Tokenizer());

- Dump to standard iCal format:

        use Jfsimon\Icalendar\Icalendar;
        use Jfsimon\Icalendar\Infra\Dumper\Formatter\RFC2445Formatter;

        ICalendar::dump($document, new RFC2445Formatter());
