<?php
/**
 * Spam Detect
 *
 * @author  Martin Stolz <herr.offizier@gmail.com>
 */

namespace spamdetect;

/**
 * Probe result interface.
 *
 * Must be implemented by every result class.
 */
interface ResultInterface
{
    /**
     * Whether analyzed message was spam.
     *
     * @return boolean
     */
    public function isSpam();

    /**
     * Explaination of isSpam() value.
     *
     * Not every probe will fill this field.
     *
     * @return string
     */
    public function getReason();
}
