<?php

namespace spamdetect;

abstract class AbstractMessage implements MessageInterface
{
    protected $ip;
    protected $userAgent;
    protected $name;
    protected $subject;
    protected $homepage;
    protected $body;
    protected $origin;

    public function getIP()
    {
        return $this->ip;
    }

    public function getUserAgent()
    {
        return $this->userAgent;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getHomepage()
    {
        return $this->homepage;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @param  string          $value
     * @return AbstractMessage
     */
    public function setIP($value)
    {
        $this->ip = $value;

        return $this;
    }

    /**
     * @param  string          $value
     * @return AbstractMessage
     */
    public function setUserAgent($value)
    {
        $this->userAgent = $value;

        return $this;
    }

    /**
     * @param  string          $value
     * @return AbstractMessage
     */
    public function setName($value)
    {
        $this->name = $value;

        return $this;
    }

    /**
     * @param  string          $value
     * @return AbstractMessage
     */
    public function setSubject($value)
    {
        $this->subject = $value;

        return $this;
    }

    /**
     * @param  string          $value
     * @return AbstractMessage
     */
    public function setHomepage($value)
    {
        $this->homepage = $value;

        return $this;
    }

    /**
     * @param  string          $value
     * @return AbstractMessage
     */
    public function setBody($value)
    {
        $this->body = $value;

        return $this;
    }

    /**
     * @param  string          $value
     * @return AbstractMessage
     */
    public function setOrigin($value)
    {
        $this->origin = $value;

        return $this;
    }
}
