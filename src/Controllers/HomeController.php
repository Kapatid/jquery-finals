<?php

abstract class HomeController extends Controller {
    
    public static function index() {
        $bachelorsDegree = new BachelorsDegree();
        $dataToShow = '';

        foreach ($bachelorsDegree->getBachelorsDegrees() as $bd) {
            $obj = $bd['id'];
            
            $dataToShow = $dataToShow. <<< HTML
                <div>$obj</div>
            HTML;
        }

        $_SESSION['test'] = $dataToShow;
    }
}