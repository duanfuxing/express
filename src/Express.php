<?php

namespace duan617\Express;

use duan617\express\Api\KuaiDi100;
use Exception;
use Illuminate\Support\Str;

/**
 * 快递物流
 * @property KuaiDi100  $kuaiDi100
 */
class Express
{
    private $config;

    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    public function __get($class)
    {
        $class = '\\duan617\\Express\\Api\\' . Str::ucfirst($class);
        if (!class_exists($class)) {
            throw new Exception($class . ', Not found', 404);
        }

        return new $class($this->config);
    }
}