<?php
namespace App;

class Url
{
    private $scheme;
    private $host;
    private $parseQ;
    private $url;
    public function __construct($url)
    {
        $urlArr       = parse_url($url);
        $this->url = $url;
        $this->scheme = $urlArr['scheme'];
        $this->host   = $urlArr['host'];
        if (array_key_exists('query', $urlArr)) {
            parse_str($urlArr['query'], $this->parseQ);
        } else {
            $this->parseQ = null;
        }
    }
    public function getScheme()
    {
        return $this->scheme;
    }
    public function getHost()
    {
        return $this->host;
    }
    public function getQueryParams()
    {
        return $this->parseQ;
    }
    public function getQueryParam($key, $defaultValue = null)
    {
        return $this->parseQ[$key] ?? $defaultValue;
    }
    public function toString()
    {
        return $this->url;
    }
    public function equals($url)
    {
        return $this->toString() === $url->toString();
    }
}