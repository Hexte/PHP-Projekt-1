<?php

include_once './database.php';
include './session.php';
//$_SESSION['check'] = 1;


$safePost = filter_input_array(INPUT_POST);

$email = $safePost['gMail'];

$queryCheck = "SELECT email FROM uporabniki WHERE email LIKE '" . $email . "'";

$stmtCheck = $pdo->prepare($queryCheck);
$stmtCheck->execute();

if($stmtCheck->rowCount() == 1){
    $_SESSION['check'] = 1;
    header("Location: login.php");
}
else {
    $_SESSION['check'] = 2;
    header("Location: reg.php");
}