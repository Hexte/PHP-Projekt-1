<?php

session_start();
include_once '../database.php';
$safePOST= filter_input_array(INPUT_POST);
$kraj_id = $safePOST['kraj'];
$id = $safePOST['id'];
$address = $safePOST['naslovInput'];
$address_id = $safePOST['address_id'];

if($id!=$_SESSION['user_id']) {
    header("Location: ../");
}
else {
    $query = "SELECT * FROM uporabniki WHERE id_u=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $row = $stmt->fetch();
}


$queryU = "UPDATE naslovi SET naslov='" . $address . "', kraj_id=" . $kraj_id . " WHERE id=" . $address_id;
$stmtU = $pdo->prepare($queryU);
$stmtU->execute();
header("Location: addresses.php?id=" . $id);
