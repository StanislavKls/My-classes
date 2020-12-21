<?php
namespace App;

class Url
{
    private $scheme;
    private $host;
    private $parseQ;
    public function __construct($url)
    {
        $urlArr       = parse_url($url);
        $this->scheme = $urlArr['scheme'];
        $this->host   = $urlArr['host'];
        parse_str($urlArr['query'], $this->parseQ);
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
}