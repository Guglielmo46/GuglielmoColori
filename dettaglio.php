<?php
require "controller.php";

$userLoggedIn = getLoggedInUser();

$colorId = $_GET['id'];

/*
$color = [
  "name" => "Rosso",
  "code" => "#ff0000",
  "r" => 255,
  "g" => 0,
  "b" => 0,
];
 */

$color = getColorFromId($colorId);

$redPercentage = ($color['red'] / 255.0) * 100;
$greenPercentage = ($color['green'] / 255.0) * 100;
$bluePercentage = ($color['blue'] / 255.0) * 100;

?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Colorambo | Dettaglio Colore <?=$color['name']?></title>
  <link href="https://fonts.googleapis.com/css?family=Lobster+Two:400,400i,700,700i|Montserrat+Alternates:400,400i,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="header">
    <h1>
      
      <a href="index.php" style="color: #f8bb5a; text-decoration: none">
          Color-U
      </a>
    
    </h1>
    <div class="login">
      <?php if ($userLoggedIn == null) { ?>
      <span>
        <i class="fas fa-user"></i>
        <a href="login.php">Login</a>
      </span>
      <?php } else { ?>
      <div>
      <div id="img-user"></div>
        Ciao, <span class="tx-bold"><?=$userLoggedIn?></span>
      </div>
      <a href="logout.php" style="color: #f8bb5a">Logout</a>
      <?php } ?>
    </div>
  </div>
  <div class="content">
    <div class="flex-cont-col max-width">
      <div class="color-info flex-cont-row h-center">
        <div
          style="background-color: <?=$color['code']?>"
          class="color-thumbnail">
        </div>
        <div class="color-data flex-cont-col v-center">
          <div
            class="color-name">
            <?=$color['name']?>
          </div>
          <div
            class="color-code">
            <?=$color['code']?>
          </div>
        </div>
      </div>
      <div class="color-stats flex-cont-row">
        <div class="color-component red">
          <div class="color-slider">
            <div
              style="width: <?=$redPercentage?>%"
              class="color-internal-slider">
            </div>
          </div>
        </div>
        <div class="color-component green">
          <div class="color-slider">
            <div
              style="width: <?=$greenPercentage?>%"
              class="color-internal-slider">
            </div>
          </div>
        </div>
        <div class="color-component blue">
          <div class="color-slider">
            <div
              style="width: <?=$bluePercentage?>%"
              class="color-internal-slider">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="script.js"></script>
</body>
</html>
