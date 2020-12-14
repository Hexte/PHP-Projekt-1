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
        <form action="kategorija_add_do.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="ime" id="ime" required="">
            <select name="nadoddelek" id="nadoddelek">
                <?php
                $query="SELECT ime, nadoddelek_id, id_o FROM oddleki ORDER BY nadoddelek_id";
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                
                while($row = $stmt->fetch()){
                    echo '<option value="' . $row['id_o'] . '">' . $row['nadoddelek_id'] . ' - ' . $row['ime'] . '</option>';
                }
                ?>
            </select>
            <input type="file" name="slika" required id="file"/>
            <input type="submit" name="submit" id="dodaj" value="Dodaj"/>
            
        </form>
    </body>
</html>