<div class="home">
<?php 
  if (isset($_SESSION['bachelorsDegrees']) || !empty($_SESSION['bachelorsDegrees'])) {
    $degrees = $_SESSION['bachelorsDegrees'];

    for ($i = 0; $i < count($_SESSION['bachelorsDegrees']); $i++) {
      $bdId = $degrees[$i]['id'];

      echo <<< HTML
        <div>$bdId</div>
      HTML;
    }
  }
?>
</div>