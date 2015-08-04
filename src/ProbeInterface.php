<?php

namespace spamdetect;

interface ProbeInterface
{
    /**
     * @param  MessageInterface $message
     * @return ResultInterface
     */
    public function analyze(MessageInterface $message);
}
