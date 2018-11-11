<?php
namespace Components\Request;

use Components\Common\GetterSetter;
use Components\Request\AbstractRequest;

class Request extends AbstractRequest
{
    public function __construct()
    {
        $this->setTimestamp($_SERVER['REQUEST_TIME']);
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];

        $query = [];
        if ($this->method === self::METHOD_GET) {
            $query = $_GET;
        } else if ($this->method === self::METHOD_POST) {
            $query = $_POST;
        } else {
            $input = file_get_contents('php://input');
            if ($_SERVER['CONTENT_TYPE'] === 'application/json') {
                $query = json_decode($input, true);
            } else if ($_SERVER['CONTENT_TYPE'] === 'application/x-www-form-urlencoded') {
                parse_str($input,$query);
            }
        }

        $this->query = new GetterSetter($query);
    }
}