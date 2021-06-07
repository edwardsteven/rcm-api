<?php
namespace EdwardSteven\RCMAPI\Providers;

use EdwardSteven\RCMAPI\Contracts\ClientInterface;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use EdwardSteven\RCMAPI\Client as RCMClient;

class RCMAPIServiceProvider extends ServiceProvider {

    public function register(){

    }

    public function boot(){

        $this->app->bind(ClientInterface::class, function($app){
            return new RCMClient(
                new Client()
            );
        });

        $this->app->bind('rcm-api', RCMClient::class);


    }

}
