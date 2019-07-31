<?php

namespace App\Core;

class Request
{
    public $methode;
    public $uri;
    private $params;

    public function __construct()
    {
        $this->methode = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->params = $_REQUEST;
    }

    public function param($key)
    {
        return $this->params[$key];
    }

    public function __get($name)
    {
        if (array_key_exists($name.$this->params)){
            return $this->param($name);
        }
    }

    public function keyExists($key) {
        return isset($this->params[$key]);
    }

    public function removeParam($key) {
        unset($this->params[$key]);
    }


}