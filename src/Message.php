<?php
/**
 * Spam Detect
 *
 * @author  Martin Stolz <herr.offizier@gmail.com>
 */

namespace spamdetect;

/**
 * Simple MessageInterface implementation based on AbstractMessage.
 */
class Message extends AbstractMessage
{
    /**
     * Initialize some message fields with values from $_SERVER array.
     *
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
            $protocol = empty($_SERVER['HTTPS']) ? 'http://' : 'https://';
            $this->setOrigin($protocol.$_SERVER['HTTP_HOST']);
        }

        return $this;
    }
}
