<?php
namespace EdwardSteven\RCMAPI\Facades;

use Illuminate\Support\Facades\Facade;

class RCM extends Facade {

    protected static function getFacadeAccessor()
    {
        return app('rcm-api');
    }

}
