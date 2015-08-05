<?php
/**
 * Spam Detect
 *
 * @author  Martin Stolz <herr.offizier@gmail.com>
 */

namespace spamdetect;

/**
 * Message interface.
 *
 * Contains all possible fields which different probes may need.
 *
 * Not every probe will use every field of this interface but you must fill
 * as many fields as possible.
 */
interface MessageInterface
{
    /**
     * Sender IP address.
     *
     * @return string
     */
    public function getIP();

    /**
     * Sender user agent.
     *
     * @return string
     */
    public function getUserAgent();

    /**
     * Sender nicnkname.
     *
     * @return string
     */
    public function getName();

    /**
     * Message's subject.
     *
     * @return string
     */
    public function getSubject();

    /**
     * Sender's email.
     *
     * @return string
     */
    public function getEmail();

    /**
     * Sender's homepage.
     *
     * @return string
     */
    public function getHomepage();

    /**
     * Message's body.
     *
     * @return string
     */
    public function getBody();

    /**
     * Current site's home url.
     *
     * @return string
     */
    public function getOrigin();
}
