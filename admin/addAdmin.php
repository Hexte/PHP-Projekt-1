<?php
/*
$username = "admin";
$passwrd="admin";

include_once '../database.php';



if (!empty($username) && !empty($passwrd)) {
    
    //$pass = sha1($pass1.$salt);
    $pass = password_hash($passwrd, PASSWORD_DEFAULT);
    
    $query = "INSERT INTO admin (username,password) "
            . "VALUES (?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username,$pass]);
    
    header("Location: index.php");
}
else {
    header("Location: in.php");
}
?>
