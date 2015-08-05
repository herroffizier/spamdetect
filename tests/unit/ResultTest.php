<?php
/**
 * Spam Detect
 *
 * @author  Martin Stolz <herr.offizier@gmail.com>
 */

namespace spamdetect\tests;

use spamdetect\Result;

class ResultTest extends \PHPUnit_Framework_TestCase
{
    public function resultFields()
    {
        return [
            [
                ['isSpam' => false, 'getReason' => ''],
                ['isSpam' => true, 'getReason' => ''],
                ['isSpam' => false, 'getReason' => 'test'],
                ['isSpam' => true, 'getReason' => 'test'],
            ],
        ];
    }

    /**
     * @dataProvider resultFields
     */
    public function testGetters(array $resultFields)
    {
        $result = new Result($resultFields['isSpam'], $resultFields['getReason']);

        foreach ($resultFields as $getter => $value) {
            $this->assertEquals($value, $result->$getter());
        }
    }
}
