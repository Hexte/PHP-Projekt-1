<?php

session_start();
include '../database.php';
include '../session.php';
//echo $_SESSION['admin'];
adminOnly();

$safePost = filter_input_array(INPUT_POST);

$query="SELECT * FROM oddleki WHERE id_o=?";
$stmt = $pdo->prepare($query);
$stmt->execute([$safePost['oddelek']]);
$row = $stmt->fetch();

if ($safePost['option'] == 1){
    $query2="UPDATE oddleki SET nadoddelek_id=NULL WHERE nadoddelek_id=" . $row['id_o'];
    $stmt2 = $pdo->prepare($query2);
    $stmt2->execute();
    
    $query3 = "DELETE FROM oddleki WHERE id_o=". $row['id_o'];
    $stmt3 = $pdo->prepare($query3);
    $stmt3->execute();
    header("Location: index.php");

    
}
else if ($safePost['option'] == 2) {
    $query2="UPDATE oddleki SET nadoddelek_id=" . $row['nadoddelek_id'] ." WHERE nadoddelek_id=" . $row['id_o'];
    $stmt2 = $pdo->prepare($query2);
    $stmt2->execute();
    
    $query3 = "DELETE FROM oddleki WHERE id_o=". $row['id_o'];
    $stmt3 = $pdo->prepare($query3);
    $stmt3->execute();
//    echo $query2;
//    echo $query3;
    
    
    header("Location: index.php");
    
}