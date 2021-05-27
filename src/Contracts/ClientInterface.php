<?php
namespace EdwardSteven\RCMAPI\Contracts;

use EdwardSteven\RCMAPI\Models\Booking;

interface ClientInterface
{

    public function categoryList() : ResponseInterface;

    /**
     * Place a booking with the RCM API
     */
    public function book(Booking $booking) : ResponseInterface;
}
