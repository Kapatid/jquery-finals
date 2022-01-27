<?php

Route::set('/', function() {
    Route::requireController('HomeController');
});

Route::set('/home', function() {
    Route::requireController('HomeController');
});

Route::set('/index.php', function() {
    Route::requireController('HomeController');
});

if (isset($_SESSION['error'])) {
    Route::requireLayout('error');
    exit;
}