<?php
/**
 * Spam Detect
 *
 * @author  Martin Stolz <herr.offizier@gmail.com>
 */

namespace spamdetect\tests\helpers;

use spamdetect\ProbeInterface;
use spamdetect\MessageInterface;
use spamdetect\Result;

/**
 * Dummy probe.
 *
 * Treats message as spam if message body has substring 'spam'.
 */
class DummyProbe implements ProbeInterface
{
    public function analyze(MessageInterface $message)
    {
        if (mb_strpos($message->getBody(), 'spam') !== false) {
            $isSpam = true;
            $reason = 'spam word found';
        } else {
            $isSpam = false;
            $reason = null;
        }

        $result = new Result($isSpam, $reason);

        return $result;
    }
}
