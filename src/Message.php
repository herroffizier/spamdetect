<?php

namespace spamdetect;

class Message extends AbstractMessage
{
    /**
     * @return Message
     */
    public function initWithCurrentRequest()
    {
        if (!empty($_SERVER['REMOTE_ADDR'])) {
            $this->setIP($_SERVER['REMOTE_ADDR']);
        }

        if (!empty($_SERVER['HTTP_USER_AGENT'])) {
            $this->setUserAgent($_SERVER['HTTP_USER_AGENT']);
        }

        if (!empty($_SERVER['HTTP_HOST'])) {
            $this->setOrigin($_SERVER['HTTP_HOST']);
        }

        return $this;
    }
}
