<?php
session_start();
include './database/config.php';
if (!isset($_SESSION["username"]) && !isset($_SESSION['password'])) {
    header("location:read.php");
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php

include 'login.php';
}
?>
</body>
</html>

