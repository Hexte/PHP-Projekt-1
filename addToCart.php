<?php
session_start();
$safeGET= filter_input_array(INPUT_GET);

$id = $safeGET['id'];

include_once 'database.php';

    
    $queryI = "INSERT INTO izdelki_kosarice (izdelek_id, id_k) VALUES (" . $id . "," . $_SESSION['kosarica'] . ")";
    echo $queryI;
    $stmtI = $pdo->prepare($queryI);
    $stmtI->execute();

    