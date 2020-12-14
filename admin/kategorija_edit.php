<?php

session_start();
include '../database.php';
include '../session.php';
//echo $_SESSION['admin'];
adminOnly();
$safePost= filter_input_array(INPUT_POST);
$query="SELECT * FROM oddleki WHERE id_o=" . $safePost['kat'];
$stmt = $pdo->prepare($query);
$stmt->execute();
$row = $stmt->fetch();
//echo $query;
?>
<html>
    <head>
        
    </head>
    <body>
        <form action="kategorija_edit_do.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="id" readonly="" required="" value="<?php echo $row['id_o']?>"/>
            <input type="text" name="ime" required="" value="<?php echo $row['ime']?>"/>
            <select name="idNad" id="idNad">
                <option value="NULL">NULL</option>
                <?php
                $query2="SELECT ime, nadoddelek_id, id_o FROM oddleki WHERE id_o != " . $safePost['kat'] . " ORDER BY nadoddelek_id";
                echo $query2; 
                $stmt2 = $pdo->prepare($query2);
                $stmt2->execute();
                
                while($row2 = $stmt2->fetch()){
                    if($row2['id_o'] != $row['nadoddelek_id']){
                        echo '<option value="' . $row2['id_o'] . '">' . $row2['ime'] . '</option>';
                    }
                    else {
                        echo '<option selected value="' . $row2['id_o'] . '">' . $row2['ime'] . '</option>';
                    }
                }
                ?>
            </select>
            <input type="file" name="slika" id="file"/>
            <input type="submit" name="submit" id="submit" value="Uredi"/>
                   
        </form>
        
    </body>
</html>
