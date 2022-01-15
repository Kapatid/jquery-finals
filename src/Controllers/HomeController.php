<?php

(new DotEnv('./.env'))->load();

class HomeController extends Controller {
    
    public static function index() {
        $url = getenv('API_URL');
        $json = file_get_contents($url);
        $obj = json_decode($json, true);
        
        $_SESSION['bachelorsDegrees'] = $obj;
    }
}