<?php
namespace app\components;

class RequestParser
{
    const URL_REGEXP = '/\/(?<controller>\w*)\/{0,1}(?<action>\w*)/';

    /** @var array */
    private $server;
    /** @var array */
    private $parsedURI;

    /**
     * RequestParser constructor.
     * @param array $server
     */
    public function __construct($server)
    {
        $this->server = $server;
        preg_match(self::URL_REGEXP, $this->server['REQUEST_URI'], $matched);
        $this->parsedURI = $matched;
    }

    /**
     * @return string
     */
    public function getControllerName()
    {
        $parsed = $this->parsedURI;

        if (!$parsed['controller']) {
            $parsed['controller'] = 'default';
        } else {
            $parsed['controller'] = strtolower($parsed['controller']);
        }

        return strtolower($parsed['controller']);
    }

    /**
     * @return string
     */
    public function getActionName()
    {
        $parsed = $this->parsedURI;

        if (!$parsed['action']) {
            $parsed['action'] = 'index';
        } else {
            $parsed['action'] = strtolower($parsed['action']);
        }

        return $parsed['action'];
    }
}
