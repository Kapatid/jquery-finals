<?php

function universalRoutes() {
    Route::set('/', function() {
        require_once('./src/Controllers/Home.php');
    });
    
    Route::set('/home', function() {
        require_once('./src/Controllers/Home.php');
    });

    Route::set('/index.php', function() {
        require_once('./src/Controllers/Home.php');
    });
}

universalRoutes();