<?php

namespace spamdetect\tests;

use spamdetect\Message;

class MessageTest extends \PHPUnit_Framework_TestCase
{
    public function createMessage()
    {
        return [
            [new Message, '1.1.1.1', 'getIP', 'setIP'],
            [new Message, 'Mozilla', 'getUserAgent', 'setUserAgent'],
            [new Message, 'Test', 'getName', 'setName'],
            [new Message, 'Subject', 'getSubject', 'setSubject'],
            [new Message, 'http://google.com/', 'getHomepage', 'setHomepage'],
            [new Message, 'spam spam spam', 'getBody', 'setBody'],
            [new Message, 'http://my.site.com/', 'getOrigin', 'setOrigin'],
        ];
    }

    /**
     * @dataProvider createMessage
     */
    public function testGettersAbdSetters($message, $value, $getter, $setter)
    {
        $this->assertNull($message->$getter());
        $this->assertEquals($message, $message->$setter($value));
        $this->assertEquals($value, $message->$getter());
    }
}
