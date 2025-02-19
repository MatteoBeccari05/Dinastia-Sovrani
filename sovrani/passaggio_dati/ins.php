<?php

require_once "../connessione_db/operazioni.php";
// recupero dei dati dal form
$nome = $_POST['nome'];
$data_inizio = $_POST['inizio'];
$data_fine = $_POST['fine'];
$img = $_POST['img'];
$predecessore = $_POST['predecessore'];
$successore = $_POST['successore'];

inserimento($nome, $data_inizio, $data_fine, $img, $predecessore, $successore);   //richiamo la funzione creata nel file operazioni

?>



