<?php

function universalRoutes() {
    /**
     * Route::set() takes in the uri request
     * If it is successful run the function
     * 
     */
    Route::set('/', function() {
        HomeController::index(); 
        HomeController::CreateView('home'); 
    });
    
    Route::set('/home', function() {
        HomeController::index();
        HomeController::CreateView('home');
    });

    Route::set('/index.php', function() {
        HomeController::index();
        HomeController::CreateView('home');
    });
}

universalRoutes();