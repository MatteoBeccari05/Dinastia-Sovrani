<?php
require_once '../strutture_pagina/functions_active_navbar.php';
$content = "Visualizza";
require_once "../connessione_db/operazioni.php";
require '../strutture_pagina/navbar.php';

?>

    <!doctype html>
    <html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Visualizza Piloti</title>
        <link rel="stylesheet" href="../style/style.css">
    </head>
<body>
    <h2><?=$content?></h2>
<?php

visualizza();

?>

<?php
require '../strutture_pagina/footer.php';
?>