<?php

namespace App\Middleware;

abstract class BaseMiddleware
{

    abstract function handle($request);

}