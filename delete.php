<?php
session_start();
require_once 'vendor/autoload.php';
if (!isset($_SESSION["username"]) && !isset($_SESSION['password'])) {
    header("location:index.php");
} else {
    include './database/confighiking.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

    delete mofo!

</body>
</html>

<?php
}

$id = $_GET['id'];
echo $id;

$hiking = ORM::for_table('hiking')->find_one($id);

    $delete = $hiking->delete();
if ($delete && $id) {
    header('location:read.php');
} else {
    echo 'oops, something bad happened. Try again :';
    echo '<a href="read.php">Back to list of hikings</a>';
}

?>
