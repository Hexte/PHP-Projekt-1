<?php

session_start();
include '../database.php';
include '../session.php';
//echo $_SESSION['admin'];
adminOnly();

?>

<html>
    <head>
        
    </head>
    <body>
        <h1>
            Kategorije
        </h1>
        &nbsp;<a href="kategorija_add.php">
            Dodaj
        </a>
        <br><br>
        <form method="POST" action="kategorija_edit.php">
            <select name="kat" id="kat">
                <?php
                $query="SELECT ime, nadoddelek_id, id_o FROM oddelki ORDER BY nadoddelek_id";
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                
                while($row = $stmt->fetch()){
                    echo '<option value="' . $row['id_o'] . '">' . $row['ime'] . '</option>';
                }
                ?>
            </select>
            <input type="submit" name="submit" id="submit" value="Uredi"/>
        </form>
          
        &nbsp;<a href="kategorija_remove.php">
            Odstrani
        </a>
    </body>
</html>
