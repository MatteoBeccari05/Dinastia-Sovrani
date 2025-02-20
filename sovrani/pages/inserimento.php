<?php
$content = 'Inserimento Sovrano ';
require_once '../strutture_pagina/functions_active_navbar.php';
require '../strutture_pagina/navbar.php';
require_once '../connessione_db/operazioni.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/style.css">
    <title>Inserimento</title>
</head>
<body>
<h2 class="titolo"><?=$content?></h2>

<form action="../passaggio_dati/ins.php" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required><br><br>

    <label for="inizio">Data inizio regno:</label>
    <input type="date" id="inizio" name="inizio" required><br><br>

    <label for="fine">Data fine regno:</label>
    <input type="date" id="fine" name="fine"><br><br>

    <label for="img">Immagine</label>
    <input type="text" id="img" name="img" required><br><br>

    <label for="predecessore">Predecessore:</label>
    <select id="predecessore" name="predecessore" >
        <?php echo ritorno_sovrani(); ?>
    </select><br><br>

    <label for="successore">Successore:</label>
    <select id="successore" name="successore" >
        <?php echo ritorno_sovrani(); ?>

    </select><br><br>

    <input type="submit" value="Inserisci ">
</form>

<br>


<?php
require '../strutture_pagina/footer.php';
?>
