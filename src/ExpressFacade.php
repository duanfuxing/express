<?php

namespace duan617\Express;

use Illuminate\Support\Facades\Facade;

class ExpressFacade extends Facade
{
    public static function __callStatic($name, $args)
    {
        return app('Express')->$name;
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'express';
    }
}
