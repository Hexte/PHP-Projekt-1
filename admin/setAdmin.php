<?php

session_start();
$_SESSION['admin'] = 1;
echo $_SESSION['admin'];
 header("Location: index.php");