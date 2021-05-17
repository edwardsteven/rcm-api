<?php

namespace EdwardSteven\RCMAPI;

use GuzzleHttp\Client as HTTPClient;
use EdwardSteven\RCMAPI\Models\Booking;
use EdwardSteven\RCMAPI\Messages\Request;
use GuzzleHttp\Exception\GuzzleException;
use EdwardSteven\RCMAPI\Messages\Response;
use EdwardSteven\RCMAPI\Exceptions\RCMServerNotConfiguredException;

class Client
{

    protected HTTPClient $client;

    /**
     * @throws RCMServerNotConfiguredException
     */
    public function __construct(HTTPClient $client)
    {
        if (!$this->correctlyConfigured()) {
            throw new RCMServerNotConfiguredException;
        }

        $this->client = $client;
    }

    protected function endpoint()
    {
        // TODO - ensure the slashes are correctly added
        return 'https://' . config('services.rcm.endpoint') . config('services.rcm.key');
    }

    protected function correctlyConfigured()
    {
        return
            !empty(config('services.rcm.endpoint')) &&
            !empty(config('services.rcm.key')) &&
            !empty(config('services.rcm.secret'));
    }

    /**
     * @param Request $request
     * @return Response
     * @throws GuzzleException
     */
    protected function request(Request $request): Response
    {
        return Response::fromResponse($this->client->post($this->endpoint(), [
                'query' => [
                    'apikey' => config('services.rcm.key')
                ],
                'json' => $request->toArray(),
                'headers' => [
                    'signature' => $request->signature()
                ]
            ]
        ));
    }


    public function categoryList()
    {
        return $this->request(Request::fromMethod('categorylist'));
    }


    /**
     * Place a booking with the RCM API
     */
    public function book(Booking $booking){

        return $this->request(Request::fromBooking($booking));

    }

}
