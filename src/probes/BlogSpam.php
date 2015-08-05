<?php
/**
 * Spam Detect
 *
 * @author  Martin Stolz <herr.offizier@gmail.com>
 */

namespace spamdetect\probes;

use spamdetect\ProbeInterface;
use spamdetect\MessageInterface;
use spamdetect\Result;
use Httpful\Request;
use \UnexpectedValueException;

/**
 * Probe for blogspam.net service.
 */
class BlogSpam implements ProbeInterface
{
    const URL = 'http://test.blogspam.net:9999/';

    const OK = 'OK';
    const SPAM = 'SPAM';

    /**
     * Base service url.
     *
     * @var string
     */
    protected $url;

    /**
     * Constructor.
     *
     * Base service url may be overriden.
     *
     * @param string|null $url
     */
    public function __construct($url = null)
    {
        $this->url = $url ?: self::URL;
    }

    /**
     * Create object for HTTP POST request to service.
     *
     * @return Request
     */
    protected function buildPostRequest()
    {
        return Request::post($this->url)->sendsJson();
    }

    /**
     * Convert message fields to request fields.
     *
     * @param  MessageInterface $message
     * @return string[]
     */
    protected function buildPostData(MessageInterface $message)
    {
        return array_filter([
            'ip' => $message->getIP(),
            'agent' => $message->getUserAgent(),
            'name' => $message->getName(),
            'subject' => $message->getSubject(),
            'link' => $message->getHomepage(),
            'comment' => $message->getBody(),
            'site' => $message->getOrigin(),
        ]);
    }

    public function analyze(MessageInterface $message)
    {
        $request = $this->buildPostRequest();

        $data = $this->buildPostData($message);
        $request->body($data);

        $response = $request->send()->body;

        if (!is_object($response)) {
            throw new UnexpectedValueException(
                'BlogSpam returned unexpected result: '
                .var_export($response, true)
            );
        }

        if (!isset($response->result)) {
            throw new UnexpectedValueException(
                'BlogSpam response missed result field: '
                .var_export($response, true)
            );
        }

        if (!in_array($response->result, [self::OK, self::SPAM])) {
            throw new UnexpectedValueException(
                'BlogSpam result field value is unknown: '
                .var_export($response->result, true)
            );
        }

        $isSpam = $response->result === self::SPAM;

        if (isset($response->reason)) {
            $reason = $response->reason;
        } else {
            $reason = null;
        }

        $result = new Result($isSpam, $reason);

        return $result;
    }
}
