<?php 
session_start();
include_once '../database.php';
$safeGET= filter_input_array(INPUT_GET);
$id = $safeGET['id'];

if($id!=$_SESSION['user_id']) {
    header("Location: ../");
}
else {
    $query = "SELECT * FROM kosarice WHERE uporabnik_id=" . $id . " AND active=0";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nakupi</title>
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js"></script>
        <style>
            
        </style>
    </head>
    <body>
        <?php include './header.php';?>
        <br>
        <div class="container-lg">
            <?php
            while ($row = $stmt->fetch()){
                echo '
                    <a href="order.php?id=' . $id . '&order=' . $row['id_k'] . '">
                        Naročilo #' . $row['id_k'] . '
                    </a><br>
                    ';
            }
            ?>
        </div>
    </body>
    
</html>
