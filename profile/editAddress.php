<?php
session_start();
include_once '../database.php';
$safeGET= filter_input_array(INPUT_GET);
$id = $safeGET['id'];
$address_id = $safeGET['address'];

if($id!=$_SESSION['user_id']) {
    header("Location: ../");
}
else {
    $query = "SELECT * FROM uporabniki WHERE id_u=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $row = $stmt->fetch();
}
$queryA = "SELECT * FROM naslovi WHERE id=" . $address_id;
$stmtA = $pdo->prepare($queryA);
$stmtA->execute();
$rowA = $stmtA->fetch();

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
        <title>Urejanje naslova</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="./pristine/dist/pristine.js"  type="text/javascript"></script>
        <style>
            body {
                height: 100vh;
            }
            #formDiv {
                max-width: 576px;
                margin: auto;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100%;
            }
            #regBtn:hover {
                color: #0056b3 !important;
                text-decoration: none !important;
                
            }
            button {
                text-decoration: none !important;
            }
            .pristine-error {
                color: red;
            }
        </style>
    </head>
    <body>
        <div id="formDiv" style="display:none;">
            <div style="min-width:100%; border-radius: 0.25rem; background-color: #f8f9fa;border: 1px solid #9f98bd">
                <form style="width:85%; margin:auto; padding-bottom: 1.5rem;" action="updateAddress.php" method="POST" name="form1" id="form1">
                    <div class="form-group">
                        <nav class="navbar navbar-light bg-light">
                            <span class="navbar-brand mb-0 h1" style="margin:auto; font-size: 2.5em;">Logo</span>
                        </nav>
                        <nav class="navbar navbar-light bg-light">
                            <span class="navbar-brand mb-0 h1" style="margin:auto; font-size: 1.4em;">Urejanje naslova</span>
                        </nav>
                      <label for="naslovInput">Naslov</label>
                      <input type="text" required="" class="form-control" id="naslovInput" name="naslovInput" value="<?php echo $rowA['naslov'] ?>" >
                    </div>
                    <div class="form-group">
                        
                            <label for="form-select" class="form-label">Pošta</label>
                            <select class="form-control" aria-label="Default select example" name="kraj" required="">
                                <option selected></option>
                                <?php
                                $queryK = "SELECT * FROM kraji ORDER BY post_st ASC";
                                $stmtK = $pdo->prepare($queryK);
                                $stmtK->execute();
                                while ($rowK=$stmtK->fetch()) {
                                    
                                    if($rowK['id_k'] == $rowA['kraj_id']){
                                       echo '
                                        <option selected="1" value="' . $rowK['id_k'] . '">' . $rowK['post_st'] . ' ' . $rowK['kraj'] . '
                                        '; 
                                    }
                                    else
                                    {
                                        echo '
                                        <option value="' . $rowK['id_k'] . '">' . $rowK['post_st'] . ' ' . $rowK['kraj'] . '
                                        ';
                                    }
                                }
                                ?>
                            </select>
                            <input type="hidden" value="<?php echo $id; ?>" name="id">
                            <input type="hidden" value="<?php echo $address_id; ?>" name="address_id">
                    </div>
                    <button type="submit" class="btn btn-primary">Uredi</button>
                    <a href="delAddress.php?id=<?php echo $id ?>&address=<?php echo $address_id ?>"
                        <button class="btn btn-link" style="float:right;">
                            <p id="regBtn"  style="color:#007bff; margin: 0; text-decoration: none;">Izbriši</p>
                        </button>
                    </a>
                    </form>
                
            </div>
        </div>
        
        <script>
                $("#formDiv").fadeIn(500, "swing");
        </script>
        
      
    </body>
</html>
