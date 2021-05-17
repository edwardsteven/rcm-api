<?php
namespace EdwardSteven\RCMAPI;

use Illuminate\Support\Facades\Facade;

class RCM extends Facade {

    protected static function getFacadeAccessor()
    {
        return app('rcm-api');
    }

}
