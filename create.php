<?php
session_start();
// include './database/config.php';
require_once 'vendor/autoload.php';

if (!isset($_SESSION["username"]) && !isset($_SESSION['password'])) {
    header("location:index.php");
} else {
    include './database/confighiking.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ajouter une randonnée</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
    <a href="read.php">Liste des données</a>
    <h1>Ajouter</h1>
    <form action="" method="post">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="Le chemin de la mort">
        </div>

        <div>
            <label for="difficulty">Difficulté</label>
            <select name="difficulty">
                <option value="très facile">Très facile</option>
                <option value="facile">Facile</option>
                <option value="moyen">Moyen</option>
                <option value="difficile">Difficile</option>
                <option value="très difficile">Très difficile</option>
            </select>
        </div>

        <div>
            <label for="distance">Distance</label>
            <input type="text" name="distance" value="3">
        </div>
        <div>
            <label for="duration">Durée</label>
            <input type="duration" name="duration" value="1035">
        </div>
        <div>
            <label for="height_difference">Dénivelé</label>
            <input type="text" name="height_difference" value="1400">
        </div>
        <button type="submit" name="button">Envoyer</button>
    </form>
</body>
</html>
<?php

if (isset($_POST['button'])) {
    $name       = $_POST['name'];
    $difficulty = $_POST['difficulty'];
    $distance   = $_POST['distance'];
    $duration   = $_POST['duration'];
    $height     = $_POST['height_difference'];

    $hiking = ORM::for_table('hiking')->create();

    $hiking->name       = $name;
    $hiking->difficulty = $difficulty;
    $hiking->distance   = $distance;
    $hiking->duration   = $duration;
    $hiking->height_difference     = $height;

    $hiking->save();

    header('location:read.php');
};
}

?>