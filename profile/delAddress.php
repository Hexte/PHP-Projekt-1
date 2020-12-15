<?php

session_start();
include_once '../database.php';
$safeGET= filter_input_array(INPUT_GET);
$id = $safeGET['id'];
$address_id = $safeGET['address'];

if($id!=$_SESSION['user_id']) {
    header("Location: ../");
}
else {
    $query = "SELECT * FROM uporabniki WHERE id_u=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $row = $stmt->fetch();
}


$queryDel = "DELETE FROM naslovi WHERE id=" . $address_id;
$stmtDel = $pdo->prepare($queryDel);
$stmtDel->execute();
header("Location: addresses.php?id=" . $id);