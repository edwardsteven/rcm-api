<?php namespace EdwardSteven\RCMAPI\Testing;

use EdwardSteven\RCMAPI\Models\Booking;
use EdwardSteven\RCMAPI\Contracts\ClientInterface;
use EdwardSteven\RCMAPI\Contracts\ResponseInterface;

class FakeClient implements ClientInterface {

    public function categoryList(): ResponseInterface
    {
        return new FakeResponse();
    }

    public function book(Booking $booking): ResponseInterface
    {
        return new FakeResponse();
    }


}
