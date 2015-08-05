<?php
/**
 * Spam Detect
 *
 * @author  Martin Stolz <herr.offizier@gmail.com>
 */

namespace spamdetect;

/**
 * Common message class with all required getters and setters defined.
 */
abstract class AbstractMessage implements MessageInterface
{
    /**
     * @var string|null
     */
    protected $ip;

    /**
     * @var string|null
     */
    protected $userAgent;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $subject;

    /**
     * @var string|null
     */
    protected $email;

    /**
     * @var string|null
     */
    protected $homepage;

    /**
     * @var string|null
     */
    protected $body;

    /**
     * @var string|null
     */
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

    public function getEmail()
    {
        return $this->email;
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
    public function setEmail($value)
    {
        $this->email = $value;

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
