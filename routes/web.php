<?php

function universalRoutes() {
    /**
     * Route::set() takes in the uri request
     * If it is successful run the function
     * 
     */
    Route::set('/', function() {
        HomeController::index(); 
        HomeController::CreateView('Home'); 
    });
    
    Route::set('/home', function() {
        HomeController::index();
        HomeController::CreateView('Home');
    });

    Route::set('/index.php', function() {
        HomeController::index();
        HomeController::CreateView('Home');
    });
}

universalRoutes();