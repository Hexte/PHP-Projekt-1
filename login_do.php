<?php
session_start();
include_once './database.php';
$safePost = filter_input_array(INPUT_POST);
$email = $safePost['emailInput'];
$passraw = $safePost['passInput'];
echo $email;
//preverim, če sem prejel podatke

if (!empty($email) && !empty($pass)) {
    
    
    $query = "SELECT * FROM uporabniki WHERE email=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);
    
    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch();
        if (password_verify($passraw, $user['geslo'])) {
            $_SESSION['user_id'] = $user['id_u'];    
            $_SESSION['name'] = $user['ime'];
            $_SESSION['lastname'] = $user['priimek'];
            $_SESSION['email'] = $user['email'];    
            $_SESSION['id_k'] = $user['id_k'];       
            header("Location: index.php");
            die();
        }
    }
}
header("Location: login.php");
