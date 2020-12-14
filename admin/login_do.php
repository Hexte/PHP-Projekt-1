<?php
session_start();
include_once '../database.php';
$safePost = filter_input_array(INPUT_POST);
$username = $safePost['userInput'];
$passraw = $safePost['passInput'];
//preverim, če sem prejel podatke
if (!empty($username) && !empty($pass)) {
    
    
    $query = "SELECT * FROM admin WHERE username=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username]);
    
    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch();
        if (password_verify($passraw, $user['password'])) {
            $_SESSION['admin_id'] = $user['id'];    
            $_SESSION['username'] = $user['username'];  
            $_SESSION['admin'] = 1;       
            header("Location: index.php");
            die();
        }
    }
}
header("Location: login.php");
