<?php

abstract class HomeController extends Controller {
    
    public static function index() {
        $bachelorsDegree = new BachelorsDegree();

        foreach ($bachelorsDegree->getBachelorsDegrees() as $bd) {
            $obj = $bd['id'];
            
            echo <<< HTML
                <div>$obj</div>
            HTML;
        }
    }
}