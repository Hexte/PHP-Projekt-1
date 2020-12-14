<?php

session_start();
include '../database.php';
include '../session.php';
//echo $_SESSION['admin'];
adminOnly();

$safePost = filter_input_array(INPUT_POST);

$ime = $safePost['ime'];
$nadoddelek_id=$safePost['idNad'];
$id = $safePost['id'];





if(isset($safePost['slika'])){
    $file=$_FILES['slika']['name'];
    $ext=$_FILES['slika']['type'];

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($file);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (isset($safePost["submit"])) {
        $check = getimagesize($_FILES["slika"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

    }
    if (file_exists($target_file)) {
        echo "Ta slika že obstaja.";
        $uploadOk = 0;
    }
    if($imageFileType !="jpg" && $imageFileType !="png" && $imageFileType !="jpeg" && $imageFileType !="gif") {
        echo "Samo formati JPG, JPEG, PNG & GIF so dovoljeni.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Vaša datoteka ni bila naložena.";

    } 


    else {
        $query = "UPDATE oddelki SET ime=?, nadoddelek_id=?, slika_url='" . basename($file) . "' WHERE id_o=?";
//        echo $query;
        $stmt = $pdo->prepare($query);
        $stmt->execute([$ime, $nadoddelek_id, $id]);

        if (move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["slika"]["name"]). " has been uploaded.";
            header("Location: index.php");
            die();
        } else {
            echo "Sorry, there was an error uploading your file.";
            die();
        }

    }
}

    $query2 = "UPDATE oddelki SET ime='" . $ime . "', nadoddelek_id=" . $nadoddelek_id . " WHERE id_o=" . $id;
    echo $query2;
        $stmt2 = $pdo->prepare($query2);
        $stmt2->execute();
        header("Location: index.php");

