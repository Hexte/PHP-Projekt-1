<?php 
session_start();
include_once '../database.php';
$safeGET= filter_input_array(INPUT_GET);
$id = $safeGET['id'];
$order= $safeGET['order'];

if($id!=$_SESSION['user_id']) {
    header("Location: ../");
}
else {
    $query = "SELECT * FROM uporabniki WHERE id_u=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $row = $stmt->fetch();
}
        
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Vvrsti</title>
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js"></script>
        <style>
            @media (min-width: 1200px) {
                .cartItem {
                    height: 10em;
                    width: 80%;
                    margin: auto;
                    border-radius: .25rem;
                    border: 0.5px #cccccc solid;
                    text-align: center;
                }
                .slika img{
                    max-height: 9.5em;
                    max-width: 14em;
                    padding-top: 0.5em;
                    
                    margin: auto;
                }
                .slika {
                    float: left;
                    width: 15em;
                }
                .title {
                    float: left;
                    padding-top: 0.75em;
                    padding-left: 1em;
                    width: 400px;
                    text-align: left;
                    height: 5em;
                }
                .cena {
                    float: right;
                    height: 50%;
                    width: 10em;
                    text-align: center;
                    line-height: 5em;
                }
                .cena p {
                    margin: 0;
                }
                .remove {
                    float: right;
                    height: 50%;
                    width: 10em;
                    text-align: center;
                    line-height: 5em;
                    
                }
                .zaloga {
                    float: left;
                    padding-top: 0.75em;
                    padding-left: 1em;
                    width: 400px;
                    text-align: left;
                }
            }
        </style>
    </head>
    <body>
        <?php include 'header.php';?>
        <div class="container-lg" style="padding: 3%;">
            <h1>
                Košarica
            </h1>
                <?php 
                $queryO = "SELECT * FROM izdelki_kosarice WHERE id_k=" . $order;
                $stmtO = $pdo->prepare($queryO);
                $stmtO->execute();

                while ($rowO = $stmtO->fetch()) {
                    $queryI = "SELECT * FROM izdelki WHERE id_i=" . $rowO['izdelek_id'];
                    $stmtI = $pdo->prepare($queryI);
                    $stmtI->execute();
                    $rowI = $stmtI->fetch();
                    $queryS = "SELECT * FROM slike WHERE izdelek_id=" . $rowO['izdelek_id'] . " AND preview=1";
                    $stmtS = $pdo->prepare($queryS);
                    $stmtS->execute();
                    $rowS = $stmtS->fetch();
                    
                    echo '
                        <a href="../izdelek.php?id=' . $rowI['id_i'] . '">
                        <div class="cartItem">
                            <div class="slika">
                                <img src="../uploads/' . $rowS['url'] . '">
                            </div>
                            <div class="title">
                                ' . $rowI['ime'] . '
                            </div>';
                    
                    
                            echo '
                            
                        </div></a></br>
                        ';

                }
                ?>
            <div class="cena" style="width:25vw">
                
                
            </div>
        </div>
    </body>
    
</html>
