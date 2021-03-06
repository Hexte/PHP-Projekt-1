<?php

include_once './database.php';

$safePost = filter_input_array(INPUT_POST);


$ime = $safePost['imeInput'];
$priimek = $safePost['priimekInput'];
$email = $safePost['emailInput'];
$pass1 = $safePost['passInput'];
$pass2 = $safePost['passConfirm'];


//echo $ime;

$queryCheck = "SELECT email FROM uporabniki WHERE email LIKE ?";
$stmtCheck = $pdo->prepare($queryCheck);
$stmtCheck->execute([$email]);

if($stmtCheck->rowCount() == 0){

    if (!empty($ime) && !empty($priimek)
            && !empty($email) 
            && !empty($pass1)
            && ($pass1 == $pass2)) {

        $pass = password_hash($pass1, PASSWORD_DEFAULT);

        $query = "INSERT INTO uporabniki (ime,priimek,email,geslo) "
                . "VALUES (?,?,?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$ime,$priimek,$email,$pass]);
        
        $queryKos = "SELECT * FROM uporabniki WHERE email LIKE ?";
        $stmtKos = $pdo->prepare($queryKos);
        $stmtKos->execute([$email]);
        
        $row = $stmtKos->fetch();
        
        $user_id = $row['id_u'];
        echo $user_id;
        $makeActive = 1;
        
        $queryKosCreate = "INSERT INTO kosarice (uporabnik_id,active) VALUES (?,?)";
        $stmtKosCreate = $pdo->prepare($queryKosCreate);
        $stmtKosCreate->execute([$user_id,$makeActive]);
        
        header("Location: login.php");
    }
    else {
        header("Location: registration.php");
    }
}
else{
    header("Location: registration.php");
}
?>

