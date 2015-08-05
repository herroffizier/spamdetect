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
class BotScout implements ProbeInterface
{
    const URL = 'http://botscout.com/test/';

    const OK = 'N';
    const SPAM = 'Y';

    /**
     * API key.
     *
     * @var string
     */
    protected $apiKey;

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
     * @param string      $apiKey
     * @param string|null $url
     */
    public function __construct($apiKey, $url = null)
    {
        $this->apiKey = $apiKey;
        $this->url = $url ?: self::URL;
    }

    /**
     * Convert message fields to request fields.
     *
     * @param  MessageInterface $message
     * @return string[]
     */
    protected function buildGetData(MessageInterface $message)
    {
        return array_filter([
            'ip' => $message->getIP(),
            'name' => $message->getName(),
            'mail' => $message->getEmail(),
        ]);
    }

    /**
     * Build reason string from spiltted response parts.
     *
     * @param  array  $responseParts
     * @return string
     */
    protected function buildReason(array $responseParts)
    {
        $reason = [];
        for ($index = 0; $index < 3; $index++) {
            $field = $responseParts[$index * 2 + 2];
            $count = (int) $responseParts[$index * 2 + 3];

            if ($count) {
                $reason[] = $field.': '.$count;
            }
        }
        $reason = implode(', ', $reason);

        return $reason;
    }

    public function analyze(MessageInterface $message)
    {
        $data = $this->buildGetData($message);

        $data['multi'] = 1;
        $data['key'] = $this->apiKey;

        $request = Request::get($this->url.'?'.http_build_query($data));

        $response = $request->send()->body;

        $responseParts = explode('|', $response);

        if (count($responseParts) !== 8) {
            throw new UnexpectedValueException(
                'BotScout returned unexpected result: '
                .var_export($response, true)
            );
        }

        if (!in_array($responseParts[0], [self::OK, self::SPAM])) {
            throw new UnexpectedValueException(
                'BotScout returned unexpected result: '
                .var_export($response->result, true)
            );
        }

        $isSpam = $responseParts[0] === self::SPAM;

        if ($isSpam) {
            $reason = $this->buildReason($responseParts);
        } else {
            $reason = null;
        }

        $result = new Result($isSpam, $reason);

        return $result;
    }
}
