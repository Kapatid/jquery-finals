<?php

class Controller{

    /**
     * Inserts a page to view
     * 
     */
    public static function CreateView(string $viewName) {
        
        if (file_exists("./public/views/" . $viewName . ".php")) {
            require_once "./public/views/" . $viewName . ".php";
        }
        elseif (file_exists("./public/views/auth/" . $viewName . ".php")) {
            require_once "./public/views/auth/" . $viewName . ".php";
        }
        elseif (file_exists("./public/views/layouts/" . $viewName . ".php")){
            require_once "./public/views/layouts/" . $viewName . ".php";
        }
    }

    /**
     * Go to an existing page
     * 
     */
    public static function goToPage(string $pageName) {

        if($_SERVER['SERVER_PORT'] !== null) {
            $base_url = "http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "$pageName";
            echo "<meta http-equiv='refresh' content='0;URL=$base_url'>";
        } else {
            $base_url = "http://" . $_SERVER['SERVER_NAME'] . "$pageName";
            echo "<meta http-equiv='refresh' content='0;URL=$base_url'>";
        }
    }
}