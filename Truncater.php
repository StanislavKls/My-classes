<?php
namespace App;

class Truncater
{
    public const OPTIONS = [
        'separator' => '...',
        'length' => 200,
    ];
    private $options;
    public function __construct (array $options = [])
    {
        $this->options = array_merge(self::OPTIONS, $options);
    }
    public function truncate (string $str, $options = [])
    {
        $options = array_merge($this->options, $options);
        $result = strlen($str) >  $options['length'] ? substr($str, 0, $options['length']) . $options['separator'] : $str;
        return $result;
    }
}