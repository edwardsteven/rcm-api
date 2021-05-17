<?php

namespace EdwardSteven\RCMAPI\Traits;

trait GeneratesRequestSignatures {

    abstract public function toJSON();

    public function signature(): string
    {
        return hash_hmac('sha256', $this->toJSON(), config('services.rcm.secret'));
    }

}
