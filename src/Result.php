<?php

namespace spamdetect;

class Result implements ResultInterface
{
    protected $isSpam;
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
