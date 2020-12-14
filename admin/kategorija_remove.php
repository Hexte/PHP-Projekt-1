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
        <form action="kategorija_remove_do.php" method="POST">
            
            <select name="oddelek" id="oddelek">
                <?php
                $query="SELECT ime, nadoddelek_id, id_o FROM oddelki WHERE glavna IS NULL ORDER BY nadoddelek_id";
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                
                while($row = $stmt->fetch()){
                    echo '<option value="' . $row['id_o'] . '">' . $row['nadoddelek_id'] . ' - ' . $row['ime'] . '</option>';
                }
                ?>
            </select>
            
            <select name="option" id="option">
                <option value="1">
                    Onemogoči podkategorije
                </option>
                <option value="2">
                    Podkategorije prestavi gor
                </option>
                
            </select>
            <input type="submit" name="submit" id="odstrani" value="Izvedi"/>
            
        </form>
        <form action="clear_kat_null.php" method="POST">
            <input type="submit" name="submit" id="brisi" value="Briši"/>
        </form>
    </body>
</html>
