<?php
/**
 * Spam Detect
 *
 * @author  Martin Stolz <herr.offizier@gmail.com>
 */

namespace spamdetect\tests;

use spamdetect\Message;

class MessageTest extends \PHPUnit_Framework_TestCase
{
    public function messageGettersAndSetters()
    {
        return [
            ['1.1.1.1', 'getIP', 'setIP'],
            ['Mozilla', 'getUserAgent', 'setUserAgent'],
            ['Test', 'getName', 'setName'],
            ['Subject', 'getSubject', 'setSubject'],
            ['test@test.ru', 'getEmail', 'setEmail'],
            ['http://google.com/', 'getHomepage', 'setHomepage'],
            ['spam spam spam', 'getBody', 'setBody'],
            ['http://my.site.com/', 'getOrigin', 'setOrigin'],
        ];
    }

    public function serverValues()
    {
        return [
            [
                ['REMOTE_ADDR' => null, 'HTTP_USER_AGENT' => null, 'HTTP_HOST' => null, 'HTTPS' => null, ],
                ['getIP' => null, 'getUserAgent' => null, 'getOrigin' => null],
            ],
            [
                ['REMOTE_ADDR' => '127.0.0.1', 'HTTP_USER_AGENT' => null, 'HTTP_HOST' => null, 'HTTPS' => null, ],
                ['getIP' => '127.0.0.1', 'getUserAgent' => null, 'getOrigin' => null],
            ],
            [
                ['REMOTE_ADDR' => null, 'HTTP_USER_AGENT' => 'Mozilla', 'HTTP_HOST' => null, 'HTTPS' => null, ],
                ['getIP' => null, 'getUserAgent' => 'Mozilla', 'getOrigin' => null],
            ],
            [
                ['REMOTE_ADDR' => null, 'HTTP_USER_AGENT' => null, 'HTTP_HOST' => 'my.site.com', 'HTTPS' => null, ],
                ['getIP' => null, 'getUserAgent' => null, 'getOrigin' => 'http://my.site.com'],
            ],
            [
                ['REMOTE_ADDR' => null, 'HTTP_USER_AGENT' => null, 'HTTP_HOST' => 'my.site.com', 'HTTPS' => true, ],
                ['getIP' => null, 'getUserAgent' => null, 'getOrigin' => 'https://my.site.com'],
            ],
        ];
    }

    /**
     * @dataProvider messageGettersAndSetters
     */
    public function testGettersAndSetters($value, $getter, $setter)
    {
        $message = new Message;

        $this->assertNull($message->$getter());
        $this->assertEquals($message, $message->$setter($value));
        $this->assertEquals($value, $message->$getter());
    }

    /**
     * @dataProvider serverValues
     */
    public function testInitFromCurrentRequest(array $serverValues, array $getterValues)
    {
        foreach ($serverValues as $key => $value) {
            if ($value !== null) {
                $_SERVER[$key] = $value;
            } elseif (isset($_SERVER[$key])) {
                unset($_SERVER[$key]);
            }
        }

        $message = new Message;
        $message->initWithCurrentRequest();

        foreach ($getterValues as $getter => $value) {
            $this->assertEquals($value, $message->$getter());
        }
    }
}
