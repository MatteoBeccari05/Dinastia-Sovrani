<?php
$config = require 'db_config.php';

require 'DB_Connect.php';
require_once 'functions.php';

$db = DataBase_Connect::getDB($config);


function inserimento($nome, $data_inizio, $data_fine, $img, $predecessore, $successore)
{
    $query = "INSERT INTO Sovrani (Nome, DataInizioRegno, DataFineRegno, Immagine, Predecessore, Successore) VALUES (:Nome, :DataInizioRegno, :DataFineRegno, :Immagine, :Predecessore, :Successore)";
    global $db;
    try
    {
        if ($nome != null && $img != null)
        {
            if($predecessore === "")
            {
                $predecessore = null;
            }
            if($successore === "")
            {
                $successore = null;
            }
            $stm = $db->prepare($query);
            $stm->bindValue(':Nome', $nome);
            $stm->bindValue(':DataInizioRegno', $data_inizio);
            $stm->bindValue(':DataFineRegno', $data_fine);
            $stm->bindValue(':Immagine', $img);
            $stm->bindValue(':Predecessore', $predecessore);
            $stm->bindValue(':Successore', $successore);

            if ($stm->execute())
            {
                $stm->closeCursor();  // chiudo la connessione
                header('Location:../redirect/confirm.html');  //per non avere problemi di scrittura doppia
            }
            else
            {
                throw new PDOException("Pilota non inserito correttamente");  // sollevo l'eccezione
            }
        }
        else
        {
            header('Location:../redirect/error.html');  //per non avere problemi di scrittura doppia
            throw new PDOException("Controlla i dati inseriti");  // sollevo l'eccezione
        }
    }
    catch (Exception $eccezione)
    {
        logError($eccezione);
    }
}


function ritorno_sovrani()
{
    global $db;
    try
    {
        // Esegui la query per recuperare i sovrani
        $query = "SELECT ID, Nome FROM Sovrani";
        $stmt = $db->query($query);

        // Variabile per contenere le opzioni HTML
        $options = '';

        // Aggiungi l'opzione "Nessuno" che mette NULL nel DB
        $options .= "<option value=''>Nessuno</option>";

        // Controlla se ci sono risultati
        if ($stmt->rowCount() > 0)
        {
            // Aggiungi ogni sovrano come opzione al select
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $options .= "<option value='" . $row['ID'] . "'>" . $row['Nome'] . "</option>";
            }
        }
        else
        {
            $options .= "<option value=''>Nessun sovrano</option>";
        }

        // Ritorna le opzioni HTML
        return $options;
    }
    catch (Exception $eccezione)
    {
        logError($eccezione);
    }
}


function visualizza()
{
    $query = "SELECT s.ID , s.Nome , s.DataInizioRegno, s.DataFineRegno,
    (SELECT p.Nome FROM anticaroma.Sovrani p WHERE p.ID = s.Predecessore) AS PredecessoreNome,
    (SELECT su.Nome FROM anticaroma.Sovrani su WHERE su.ID = s.Successore) AS SuccessoreNome
    FROM anticaroma.Sovrani s";

    global $db;
    try
    {
        $stm = $db->prepare($query);
        $stm->execute(); // eseguo la query

        echo '<table>';
        echo '<tr><th>ID</th><th>Nome</th><th>Data inizio</th><th>Data fine</th><th>Predecessore</th><th>Successore</th></tr>';

        while ($sovrano = $stm->fetch())
        {
            // Righe della tabella
            echo '<tr>';
            echo '<td>' . $sovrano->ID . '</td>';
            echo '<td>' . $sovrano->Nome . '</td>';
            echo '<td>' . $sovrano->DataInizioRegno . '</td>';
            echo '<td>' . $sovrano->DataFineRegno . '</td>';
            echo '<td>' . $sovrano->PredecessoreNome . '</td>';
            echo '<td>' . $sovrano->SuccessoreNome . '</td>';
            echo '</tr>';
        }

        echo '</table>'; // Fine della tabella

        $stm->closeCursor();  // chiudo la connessione
    }
    catch (Exception $eccezione)
    {
        logError($eccezione);
    }

}
?>

