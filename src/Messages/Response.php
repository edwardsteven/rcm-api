<?php

namespace EdwardSteven\RCMAPI\Messages;

use Illuminate\Support\Collection;
use Psr\Http\Message\ResponseInterface;

class Response {

    protected Collection $response;

    /**
     * @throws \JsonException
     */
    public function __construct(ResponseInterface $response){

        $this->response = collect(json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR));

    }

    public static function fromResponse(ResponseInterface $response): Response
    {
        return new static($response);
    }

    public function isError(){
        return $this->status() !== 'OK';
    }

    public function error(){
        return $this->response->get('error');
    }

    public function results(){
        return collect($this->response->get('results'));
    }

    public function status(){
        return $this->response->get("status");
    }


}
