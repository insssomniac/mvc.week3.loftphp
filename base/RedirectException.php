<?php
namespace Base;

use Throwable;

class RedirectException extends \Exception
{
    private $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}