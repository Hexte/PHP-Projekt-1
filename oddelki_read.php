<?php

include_once 'database.php';

    $query = "SELECT * FROM oddleki WHERE glavna=1";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    while ($row = $stmt->fetch()) {
        echo '<li><a href="kategorija.php?ime=' . $row['ime'] . '">' . $row['ime'] . '</a></li>';
        
    }
    
