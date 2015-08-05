<?php
/**
 * Spam Detect
 *
 * @author  Martin Stolz <herr.offizier@gmail.com>
 */

namespace spamdetect;

/**
 * Simple ResultInterface implementation.
 */
class Result implements ResultInterface
{
    /**
     * @var isSpam
     */
    protected $isSpam;

    /**
     * @var string
     */
    protected $reason;

    public function __construct($isSpam, $reason)
    {
        $this->isSpam = (bool) $isSpam;
        $this->reason = (string) $reason;
    }

    public function isSpam()
    {
        return $this->isSpam;
    }

    public function getReason()
    {
        return $this->reason;
    }
}
