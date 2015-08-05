Spam Detect
===========

[![Build Status](https://travis-ci.org/herroffizier/spamdetect.svg?branch=master)](https://travis-ci.org/herroffizier/spamdetect) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/herroffizier/spamdetect/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/herroffizier/spamdetect/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/herroffizier/spamdetect/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/herroffizier/spamdetect/?branch=master) [![Code Climate](https://codeclimate.com/github/herroffizier/spamdetect/badges/gpa.svg)](https://codeclimate.com/github/herroffizier/spamdetect)

**Spam Detect** is a common interface for different antispam and antibot services written in PHP. Main purpose of the project is to help block spam in comments, reviews or blogposts.

Usage
-----

Usage is quite simple.

```php

// Initialize probe (each service should have it's own probe).
$probe = new spamdetect\probes\BlogSpam;

// Initialize main detector class with probe object.
$detector = new spamdetect\Detector($probe);

// Create message object.
$message = new spamdetect\Message;
$message->
    setIP('1.1.1.1')->
    setName('IAmSpammer')->
    setBody('spam spam spam')->
    setOrigin('http://my.site.com/');

// Analyze message with given probe.
$result = $detector->analyze($message);

var_dump([
    // Spam flag.
    $result->isSpam(),
    // Reason (if any).
    $result->getReason(),
]);
```

Please refer to source code for more detailed information.