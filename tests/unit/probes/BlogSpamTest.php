<?php
/**
 * Spam Detect
 *
 * @author  Martin Stolz <herr.offizier@gmail.com>
 */

namespace spamdetect\tests\probes;

use spamdetect\Detector;
use spamdetect\Message;
use spamdetect\probes\BlogSpam;

class BlogSpamTest extends \PHPUnit_Framework_TestCase
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

    /**
     * @dataProvider messageSettersAndResultGetters
     */
    public function testProbe(array $messageSetters, array $resultGetters)
    {
        $message = new Message;
        foreach ($messageSetters as $setter => $value) {
            $message->$setter($value);
        }

        $probe = new BlogSpam;
        $detector = new Detector($probe);
        $result = $detector->analyze($message);

        foreach ($resultGetters as $getter => $value) {
            $this->assertEquals($value, $result->$getter());
        }
    }
}
