<?php
require "controller.php";
//require "mock_controller.php";

$colori = getAllColors();

$userLoggedIn = getLoggedInUser();

if ($userLoggedIn != null) {
  $colori[] = [
    "code" => "#ffffff",
    "name" => "Aggiungi colore",
    "is_add" => true,
  ];
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Colorambo v0.0.1</title>
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <!-- <i class="fas fa-user"></i> -->
        <a href="login.php">Login</a>
      </span>
      <?php } else { ?>
      <div>
        <!-- <i class="fas fa-user"></i> -->
        <div id="img-user"></div>
        Ciao, <span class="tx-bold"><?=$userLoggedIn?></span>
      </div>
      <a href="logout.php" style="color: #f8bb5a">Logout</a>
      <?php } ?>
    </div>
  </div>
  <div class="content flex-cont-row">
      <?php if (count($colori) > 0) { ?>
        <div class="colors-container max-width flex-1">
          <?php foreach ($colori as $color) { ?>
            <div
              class="color">
              <div
                class="color-bg"
                style="background-color: <?=$color['code']?>">
                <div class="color-cont">
                  <span style="border-radius: 50%">
                    <?php if (isset($color['is_add'])) { ?>
                    <a
                      href="aggiungi_colore.php"
                      style="color: #888">
                      Aggiungi Colore
                    </a>
                    <?php } else { ?>
                    <a 
                      href="dettaglio.php?id=<?=$color['id']?>"
                      style="color: <?=$color['code']?>; text-decoration: none">
                      <?=$color['name']?>
                      &nbsp &nbsp &nbsp
                    </a>
                    <a href="modifica_colore.php?id=<?=$color['id']?>"><i class="fa fa-pencil" aria-hidden="true" style="color: #888"></i></a>
                    &nbsp &nbsp 
                    <a href=""><i class="fa fa-trash" aria-hidden="true" style="color: #888"></i></a>
                    <?php } ?>
                  </span>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      <?php } else { ?>
        <div class="no-colors-cont tx-center flex-1 v-center flex-cont-col">
          <h3>Nessun colore da mostrare</h3>
        </div>
      <?php } ?>
  </div>
  <script src="script.js"></script>
</body>
</html>
