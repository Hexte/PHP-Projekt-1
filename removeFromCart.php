<?php
session_start();
include_once 'database.php';
$safeGET= filter_input_array(INPUT_GET);
$id = $safeGET['id'];

$query = "DELETE FROM izdelki_kosarice WHERE izdelek_id=" . $id . " AND id_k=" . $_SESSION['kosarica'];
echo $query;
$stmt = $pdo->prepare($query);
$stmt->execute();
header("Location: kosarica.php");
