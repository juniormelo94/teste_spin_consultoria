<?php

namespace app\controllers;

use app\core\request\Request;

class HomeController
{
    public function index()
    {
        view('home.home');
    }
}