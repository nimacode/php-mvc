<?php

namespace App\Controller;

use App\Model\UserModel;
use App\Service\View\View;

class HomeController
{
    public function index()
    {
        View::load("index");
    }
}