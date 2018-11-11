<?php
namespace Components\ParamInjector;

class ParamInjector
{
    public function inject(...$args)
    {
        try {
            $method = new \ReflectionMethod('Base\BaseController', 'Index');
            $params = $method->getParameters();

            $class = $params[0]->getType()->getName();

            echo $args[0] instanceof $class;
        } catch (\Exception $err) {
            echo $err->getMessage();
        }
    }
}