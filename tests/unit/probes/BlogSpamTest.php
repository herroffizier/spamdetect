<?php
/**
 * Spam Detect
 *
 * @author  Martin Stolz <herr.offizier@gmail.com>
 */

namespace spamdetect\tests\probes;

use spamdetect\tests\helpers\ProbeTestCase;
use spamdetect\probes\BlogSpam;

class BlogSpamTest extends ProbeTestCase
{
    public function messageSettersAndResultGetters()
    {
        return [
            [
                ['setIP' => '192.168.1.1', 'setName' => 'John', 'setBody' => 'This is very good post and not a spam.', 'setOrigin' => 'http://my.site.com'],
                ['isSpam' => false],
            ],
            [
                ['setIP' => '192.168.1.1', 'setName' => 'John', 'setBody' => 'SPAM', 'setOrigin' => 'http://my.site.com'],
                ['isSpam' => true],
            ],
        ];
    }

    protected function getProbe()
    {
        $probe = new BlogSpam;

        return $probe;
    }
}
