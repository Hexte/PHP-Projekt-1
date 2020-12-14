<?php
session_start();
$safeGET= filter_input_array(INPUT_GET);

$ime = $safeGET['id'];

include_once 'database.php';

    $queryI="SELECT * FROM izdelki WHERE id_i=" . $ime;
     
    $stmtI = $pdo->prepare($queryI);
    $stmtI->execute();
    $rowI= $stmtI->fetch();
   // echo $queryI;
    

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>VVRSTI</title>
        <link rel="stylesheet" href="./css/main.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

    </head>
    <body>
        <?php require 'header.php'; ?>
        
        <div class="container-lg" style="padding: 3%;">
            <div class="itemHead">
                <?php 
                    echo '<h1>' . $rowI['ime'] . '</h1>';
                ?>
            </div>
            <div class="slike">
                <?php
                    $queryS="SELECT * FROM slike WHERE izdelek_id= '" . $rowI['id_i'] . "'";
                    $stmtS = $pdo->prepare($queryS);
                    $stmtS->execute();
                    while($rowS= $stmtS->fetch()){
                        
                        
                        
                        echo '<img src="./uploads/' . $rowS['url'] . '" style="max-width:25%"></img>';
                    }
                ?>
            </div>
            <div class="opis">
                <?php echo $rowI['opis']; ?>
            </div>
            <div class="cena">
                <?php echo $rowI['cena'] . "€"; ?>
            </div>
            <div class="cart">
                <a href="addToCart.php?id=<?php echo $rowI['id_i'] ?>">Dodaj v košarico</a>
            </div>
        </div>

    </body>
</html>

