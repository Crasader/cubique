<?php
namespace Components\Response;

use Components\Response\AbstractResponseHandler;

class ResponseHandler extends AbstractResponseHandler
{
    public function handle()
    {
        echo $this->getRequest()->isValid() ? 'true' : 'false';
    }
}