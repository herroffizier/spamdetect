<?php
/**
 * Spam Detect
 *
 * @author  Martin Stolz <herr.offizier@gmail.com>
 */

namespace spamdetect\tests\helpers;

use spamdetect\Detector;
use spamdetect\Message;
use spamdetect\ProbeInterface;

abstract class ProbeTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    abstract public function messageSettersAndResultGetters();

    /**
     * @return ProbeInterface
     */
    abstract protected function getProbe();

    /**
     * @dataProvider messageSettersAndResultGetters
     */
    public function testProbe(array $messageSetters, array $resultGetters)
    {
        $message = new Message;
        foreach ($messageSetters as $setter => $value) {
            $message->$setter($value);
        }

        $probe = $this->getProbe();
        $detector = new Detector($probe);
        $result = $detector->analyze($message);

        foreach ($resultGetters as $getter => $value) {
            $this->assertEquals($value, $result->$getter());
        }
    }
}
