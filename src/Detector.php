<?php
/**
 * Spam Detect
 *
 * @author  Martin Stolz <herr.offizier@gmail.com>
 */

namespace spamdetect;

/**
 * Base detector class.
 */
class Detector implements ProbeInterface
{
    /**
     * @var ProbeInterface
     */
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
