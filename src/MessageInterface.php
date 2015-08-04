<?php

namespace spamdetect;

interface MessageInterface
{
    /**
     * @return string
     */
    public function getIP();
    /**
     * @return string
     */
    public function getUserAgent();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getSubject();

    /**
     * @return string
     */
    public function getHomepage();

    /**
     * @return string
     */
    public function getBody();

    /**
     * @return string
     */
    public function getOrigin();
}
