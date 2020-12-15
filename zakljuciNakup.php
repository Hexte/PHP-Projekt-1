<?php

session_start();
include_once 'database.php';

$qExt;
$i=0;

$queryStock = "SELECT * FROM izdelki_kosarice WHERE id_k=" . $_SESSION['kosarica'] . " AND (SELECT active FROM kosarice WHERE id_k=" . $_SESSION['kosarica'] . " AND active=1)";
$stmtStock = $pdo->prepare($queryStock);
$stmtStock->execute();
while ($rowStock = $stmtStock->fetch()){
    if($i != 0){
        $qExt = $qExt . " OR ";
    }
    $queryStock1 = "SELECT zaloga FROM izdelki WHERE id_i=" . $rowStock['izdelek_id'];
    $stmtStock1 = $pdo->prepare($queryStock1);
    $stmtStock1->execute();
    $rowStock1 = $stmtStock1->fetch();
    switch ($rowStock1['zaloga']){
        case 0: 
            echo 'no';
            header("location: index.php");
    };      
    $i++;
    $qExt = $qExt . "id_i=" . $rowStock['izdelek_id'];
    }

$queryChange = "UPDATE izdelki SET zaloga=zaloga-1 WHERE " . $qExt;
$stmtChange = $pdo->prepare($queryChange);
$stmtChange->execute();

$queryDis = "UPDATE kosarice SET active=0 WHERE active=1 AND uporabnik_id=" . $_SESSION['user_id'];
$stmtDis = $pdo->prepare($queryDis);
$stmtDis->execute();

$queryKosCreate = "INSERT INTO kosarice (uporabnik_id,active) VALUES (?,1)";
        $stmtKosCreate = $pdo->prepare($queryKosCreate);
        $stmtKosCreate->execute([$_SESSION['user_id']]);
$queryKosGet = "SELECT * FROM kosarice WHERE uporabnik_id=" . $_SESSION['user_id'] . " AND active=1";
            //echo $queryKosGet;
            $stmtKosGet = $pdo->prepare($queryKosGet);
            $stmtKosGet->execute();
            $kos = $stmtKosGet->fetch();
            $_SESSION['kosarica'] = $kos['id_k'];
    header("location: index.php");
