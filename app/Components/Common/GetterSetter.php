<?php
namespace Components\Common;

class GetterSetter
{
    private $data = [];
    public function __construct(array $values = [])
    {
        foreach ($values as $key => $value) {
            $this->set($key, $value);
        }
    }

    public function get($key) {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }

    public function set($key, $value) {
        $this->data[$key] = $value;
        return $this;
    }

    public function all()
    {
        return $this->data;
    }
}