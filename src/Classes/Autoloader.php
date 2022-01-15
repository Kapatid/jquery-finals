<?php

/**
 * Check availability of class once user goes to a url
 */
spl_autoload_register(function ($className) {
    if (file_exists("./src/Classes/" . $className . ".php")) {
        require_once "./src/Classes/" . $className . ".php";
    }
    else if (file_exists("./src/Models/" . $className . ".php")){
        require_once "./src/Models/" . $className . ".php";
    }
    else if (file_exists("./src/Controllers/" . $className . ".php")){
        require_once "./src/Controllers/" . $className . ".php";
    }
});