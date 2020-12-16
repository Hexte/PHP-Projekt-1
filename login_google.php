<?php

session_start();
include_once './database.php';
$safePost = filter_input_array(INPUT_POST);
$email = $safePost['emailInputGoogle'];

if (!empty($email)) {
    
    
    $query = "SELECT * FROM uporabniki WHERE email=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);
    
    if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            $queryKosGet = "SELECT * FROM kosarice WHERE uporabnik_id=" . $user['id_u'] . " AND active=1";
            //echo $queryKosGet;
            $stmtKosGet = $pdo->prepare($queryKosGet);
            $stmtKosGet->execute();
            $kos = $stmtKosGet->fetch();
        
            $_SESSION['user_id'] = $user['id_u'];    
            $_SESSION['name'] = $user['ime'];
            $_SESSION['lastname'] = $user['priimek'];
            $_SESSION['email'] = $user['email'];    
            $_SESSION['id_k'] = $user['id_k'];
            $_SESSION['kosarica'] = $kos['id_k'];
            
            header("Location: index.php");
            die();
        
    }
}
header("Location: login.php");
    ?>
