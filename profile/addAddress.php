<?php
session_start();
include_once '../database.php';
$safePost = filter_input_array(INPUT_POST);
$id = $safePost['id'];
$naslov = $safePost['naslovInput'];
$kraj_id = $safePost['kraj'];


$query = "INSERT INTO naslovi(naslov,kraj_id,uporabnik_id) VALUES ('" . $naslov . "'," . $kraj_id . "," . $id . ")";
$stmt = $pdo->prepare($query);
$stmt->execute();
header("Location: ./addresses.php?id=" . $id);