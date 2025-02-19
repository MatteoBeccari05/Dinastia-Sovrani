<?php
require_once 'functions_active_navbar.php'
?>


<div class="navbar">
    <a href="home.php" class="<?= isActive('home.php') ?>"> Home</a>
    <a href="inserimento.php" class="<?= isActive('inserimento.php') ?>"> Inserimento </a>
    <a href="visualizza.php" class="<?= isActive('visualizza.php') ?>"> Visualizza</a>
</div>



