<?php
namespace Components\Request;

use Components\Request\RequestInterface;
use Components\Common\GetterSetter;

abstract class AbstractRequest implements RequestInterface
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_UPDATE = 'UPDATE';
    const METHOD_DELETE = 'DELETE';
    const METHOD_PATCH = 'PATCH';

    public $query;
    protected $method;
    protected $uri;
    private $timestamp;
    private $valid = false;

    public function getMethod()
    {
        return $this->method;
    }

    public function getURI()
    {
        return $this->uri;
    }

    public function setValid($flag)
    {
        $this->valid = $flag;
        return $this;
    }

    public function isAjaxRequest()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }

    public function isValid()
    {
        return $this->valid;
    }

    protected function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }
}