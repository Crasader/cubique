<?php
namespace Components\Response;

use Components\Request\Request;
use Components\Response\AbstractResponseHandler;
use Components\ParamInjector\ParamInjector;

class ResponseHandler extends AbstractResponseHandler
{
    private $paramInjector;
    public function __construct(Request $request)
    {
        $this->paramInjector = new ParamInjector();

        parent::__construct($request);
    }
    public function handle()
    {
        $this->paramInjector->inject([]);
    }
}