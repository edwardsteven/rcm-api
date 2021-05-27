<?php
namespace EdwardSteven\RCMAPI\Contracts;

interface ResponseInterface
{
    public function isError();

    public function error();

    public function results();

    public function status();
}
