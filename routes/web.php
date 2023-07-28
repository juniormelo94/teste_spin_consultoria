<?php

use app\core\route\Route;

return [  
    '/' => function () {
        Route::get('HomeController@index');
    },
    '/proposals/index' => function () {
        Route::get('ProposalsController@index');
    }, 
    '/proposals/create' => function () {
        Route::get('ProposalsController@create');
    },
    '/proposals/store' => function () {
        Route::post('ProposalsController@store');
    }
];