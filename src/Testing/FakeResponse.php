<?php namespace EdwardSteven\RCMAPI\Testing;

use EdwardSteven\RCMAPI\Contracts\ResponseInterface;
use Illuminate\Support\Collection;

class FakeResponse implements ResponseInterface {

    protected bool $isError = false;

    protected Collection $results;

    protected string $errorMessage = '';

    public function __construct($results = []){
        $this->results = collect($results);
    }

    public function isError() : bool
    {
        return $this->isError;
    }

    public function error() : ?string
    {
        return $this->errorMessage;
    }

    public function results() : Collection
    {
        return $this->results;
    }

    public function status() : string
    {
        return 'TESTING';
    }

    public function setError(bool $isError, string $message = ''){
        $this->isError = $isError;
        $this->errorMessage = $message;
    }


}
