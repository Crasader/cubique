<?php
namespace Components\Request;

interface RequestInterface
{
    public function getMethod();
    public function getURI();
}