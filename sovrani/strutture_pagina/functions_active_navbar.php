<?php
function isActive($page)
{
    return (basename($_SERVER['SCRIPT_NAME']) === $page) ? 'active' : '';  //restituisce solo il nome del file
}
?>
