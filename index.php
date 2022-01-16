<?php
    // First file to be run
    session_start();
    ob_start();
    require_once('./src/Classes/Autoloader.php');
    require_once('./src/layouts/app.php');