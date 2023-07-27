<?php

use app\core\route\Route;

return [  
    '/' => function () {
        Route::get('HomeController@index');
    },
    '/proposals/index' => function () {
        Route::get('ProposalsController@index');
    }
];