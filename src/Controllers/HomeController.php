<?php
$bachelorsDegree = new BachelorsDegree();
$dataToShow = '';

foreach ($bachelorsDegree->getBachelorsDegrees() as $bd) {
    $obj = $bd['id'];
    
    $dataToShow = $dataToShow.<<<HTML
        <div>$obj</div>
    HTML;
}

echo <<<HTML
    <div class="home">
        $dataToShow
    </div>
HTML;
?>

