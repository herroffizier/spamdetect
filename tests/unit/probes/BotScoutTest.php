<?php
/**
 * Spam Detect
 *
 * @author  Martin Stolz <herr.offizier@gmail.com>
 */

namespace spamdetect\tests\probes;

use spamdetect\tests\helpers\ProbeTestCase;
use spamdetect\probes\BotScout;

class BotScoutTest extends ProbeTestCase
{
    public function messageSettersAndResultGetters()
    {
        return [
            [
                ['setIP' => '8.8.4.4',],
                ['isSpam' => false],
            ],
            [
                ['setIP' => '46.151.52.61',],
                ['isSpam' => true],
            ],
        ];
    }

    protected function getProbe()
    {
        $key = '';
        $probe = new BotScout($key);

        return $probe;
    }
}
