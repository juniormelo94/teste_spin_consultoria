<?php

namespace app\controllers;

use app\core\request\Request;

class ProposalsController
{
    public function index()
    {
        view('proposals.index');
    }
}