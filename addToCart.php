<?php
session_start();
include_once 'database.php';
$safeGET= filter_input_array(INPUT_GET);

$id = $safeGET['id'];

$query = "SELECT zaloga FROM izdelki WHERE id_i=" . $id;
$stmt = $pdo->prepare($query);
$stmt->execute();
$row = $stmt->fetch();
//echo $row['zaloga'];
if($row['zaloga'] != 0)
{
    $queryCheck = "SELECT * FROM izdelki_kosarice WHERE izdelek_id=" . $id . " AND id_k=" . $_SESSION['kosarica'];
    $stmtCheck = $pdo->prepare($queryCheck);
    $stmtCheck->execute();
    if($stmtCheck->rowCount() == 0){
        $queryI = "INSERT INTO izdelki_kosarice (izdelek_id, id_k) VALUES (" . $id . "," . $_SESSION['kosarica'] . ")";
        //echo $queryI;
        $stmtI = $pdo->prepare($queryI);
        $stmtI->execute();
        header("Location: izdelek.php?id=" . $id);
    }
    else {
        echo 'no1';
    }
    
    
    
    

    }
 else {
        echo 'no2';
}