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

        use TimeMachine\ICal\ICal;
        use TimeMachine\ICal\Parser\Tokenizer\RFC2445Tokenizer;

        ICal::parse($content, new RFC2445Tokenizer());

- Dump to standard iCal format:

        use TimeMachine\ICal\ICal;
        use TimeMachine\ICal\Dumper\Formatter\RFC2445Formatter;

        ICal::dump($document, new RFC2445Formatter());

Misc:
-----

- License: MIT
