<?php
namespace Components\Response;

use Components\Handler\HandlerInterface;
use Components\Response\ResponseHandlerInterface;
use Components\Request\Request;

abstract class AbstractResponseHandler implements HandlerInterface, ResponseHandlerInterface
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getRequest()
    {
        return $this->request;
    }
}