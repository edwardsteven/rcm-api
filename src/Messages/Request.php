<?php

namespace EdwardSteven\RCMAPI\Messages;

use EdwardSteven\RCMAPI\Models\Booking;
use EdwardSteven\RCMAPI\Traits\GeneratesRequestSignatures;

class Request {

    use GeneratesRequestSignatures;

    protected $method;

    protected $payload = [];

    public function __construct(string $method, array $payload = []){
        $this->method = $method;
        $this->payload = $payload;
    }

    public static function fromMethod($method, $payload = []){
        return new static($method);
    }

    public static function fromBooking(Booking $booking){
        $request = new static('booking');
        $request->payload = $booking->toArray();
        return $request;
    }

    public function toArray(){
        return array_merge([
            'method' => $this->method
        ], $this->payload);
    }

    /**
     * @throws \JsonException
     */
    public function toJSON(){
        return json_encode($this->toArray(), JSON_THROW_ON_ERROR);
    }

}
