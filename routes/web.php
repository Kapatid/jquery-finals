<?php

Route::set('/', function() {
    Route::requireController('Home');
});

Route::set('/home', function() {
    Route::requireController('Home');
});

Route::set('/index.php', function() {
    Route::requireController('Home');
});

if (isset($_SESSION['error'])) {
    Route::requireLayout('error');
    exit;
}