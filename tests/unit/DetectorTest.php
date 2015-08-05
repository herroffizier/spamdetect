<?php
/**
 * Spam Detect
 *
 * @author  Martin Stolz <herr.offizier@gmail.com>
 */

namespace spamdetect\tests;

use spamdetect\Detector;
use spamdetect\Message;
use spamdetect\tests\helpers\DummyProbe;

class DetectorTest extends \PHPUnit_Framework_TestCase
{
    public function messageSettersAndResultGetters()
    {
        return [
            [
                ['setBody' => ''],
                ['isSpam' => false, 'getReason' => ''],
            ],
            [
                ['setBody' => 'spam spam'],
                ['isSpam' => true, 'getReason' => 'spam word found'],
            ],
        ];
    }

    /**
     * @dataProvider messageSettersAndResultGetters
     */
    public function testDetector(array $messageSetters, array $resultGetters)
    {
        $message = new Message;
        foreach ($messageSetters as $setter => $value) {
            $message->$setter($value);
        }

        $probe = new DummyProbe;
        $detector = new Detector($probe);
        $result = $detector->analyze($message);

        foreach ($resultGetters as $getter => $value) {
            $this->assertEquals($value, $result->$getter());
        }
    }
}
