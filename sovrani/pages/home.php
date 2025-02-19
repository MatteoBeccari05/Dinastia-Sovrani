<?php
$content = 'Antica Roma <br> Gestione dei Sovrani';
require_once '../strutture_pagina/functions_active_navbar.php';
require '../strutture_pagina/navbar.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/style.css">
    <title>Home</title>
</head>
<body>
<h2 class="titolo"><?=$content?></h2>
<br>


<?php
require '../strutture_pagina/footer.php';
?>


