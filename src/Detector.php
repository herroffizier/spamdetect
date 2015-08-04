<?php

namespace spamdetect;

class Detector
{
    protected $probe;

    public function __construct(ProbeInterface $probe)
    {
        $this->probe = $probe;
    }

    public function analyze(MessageInterface $message)
    {
        $result = $this->probe->analyze($message);

        return $result;
    }
}
