<?php

namespace spamdetect;

interface ResultInterface
{
    public function isSpam();

    public function getReason();
}
