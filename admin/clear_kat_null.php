<?php

session_start();
include '../database.php';
include '../session.php';
//echo $_SESSION['admin'];
adminOnly();

$safePost = filter_input_array(INPUT_POST);

$query = "DELETE FROM oddelki WHERE nadoddelek_id IS NULL AND glavna IS NULL;";
$stmt = $pdo->prepare($query);
$stmt->execute();
header("Location: index.php");