<?php
/**
 * Spam Detect
 *
 * @author  Martin Stolz <herr.offizier@gmail.com>
 */

namespace spamdetect;

/**
 * Probe interface.
 *
 * Must be implemented by every probe.
 */
interface ProbeInterface
{
    /**
     * Detect spam in message.
     *
     * @param  MessageInterface $message
     * @return ResultInterface
     */
    public function analyze(MessageInterface $message);
}
