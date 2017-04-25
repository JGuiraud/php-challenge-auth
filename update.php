<?php
session_start();
// include './database/config.php';
require_once 'vendor/autoload.php';

if (!isset($_SESSION["username"]) && !isset($_SESSION['password'])) {
    header("location:index.php");
} else {
    include './database/confighiking.php';

    $id = $_GET['id'];

    $hiking = ORM::for_table('hiking')->where('id', $id)->find_many();

    foreach ($hiking as $hike) {
        $name = $hike->name;
        $distance = $hike->distance;
        $difficulty = $hike->difficulty;
        $duration = $hike->duration;
        $height = $hike->height_difference;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ajouter une randonnée</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
    <a href="/read.php">Liste des données</a>
    <h1>Modifier</h1>
    <form action="" method="POST">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="<?php echo$name; ?>">
        </div>

        <div>
            <label for="difficulty">Difficulté</label>
            <select name="difficulty">
                <option value="très facile" <?php if ($difficulty == "très facile") {
                    echo'selected="selected"';
} ?> >Très facile</option>
                <option value="facile" <?php if ($difficulty=="facile") {
                    echo'selected="selected"';
} ?>>Facile</option>
                <option value="moyen" <?php if ($difficulty=="moyen") {
                    echo 'selected="selected"';
} ?> >Moyen</option>
                <option value="difficile" <?php if ($difficulty=="difficile") {
                    echo'selected="selected"';
} ?>>Difficile</option>
                <option value="très difficile" <?php if ($difficulty=="très difficile") {
                    echo'selected="selected"';
} ?>>Très difficile</option>
            </select>
        </div>

        <div>
            <label for="distance">Distance</label>
            <input type="text" name="distance" value="<?php echo$distance; ?>">
        </div>
        <div>
            <label for="duration">Durée</label>
            <input type="duration" name="duration" value="<?php echo$duration ?>">
        </div>
        <div>
            <label for="height_difference">Dénivelé</label>
            <input type="text" name="height_difference" value="<?php echo $height; ?>">
        </div>
        <button type="submit" name="button">Modifier</button>
    </form>
<?php

if (isset($_POST['button'])) {
    $name2      = $_POST['name'];
    $difficulty2 = $_POST['difficulty'];
    $distance2 = $_POST['distance'];
    $duration2 = $_POST['duration'];
    $height2 = $_POST['height_difference'];

    echo $name2;
    $hiking2 = ORM::for_table('hiking')->find_one($id);

    $hike->set(array(
    'name' => $name2,
    'difficulty'  => $difficulty2,
    'distance'  => $distance2,
    'duration'  => $duration2,
    'height_difference'  => $height2
    ));

    $hike->save();
    header('location:read.php');
    $_SESSION['updated'];
}
}
?>
</body>
</html>