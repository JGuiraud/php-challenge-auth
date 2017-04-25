<?php
require_once 'vendor/autoload.php';
include './database/confighiking.php';

$hikings = ORM::for_table('hiking')->find_result_set();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  </head>
  <body>
    <h1>Liste des randonnées</h1>

 <div class="">
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Difficulté</th>
        <th>Distance</th>
        <th>Durée</th>
        <th>Dénivelé</th>
      </tr>
    </thead>
    <tbody>

<?php

foreach ($hikings as $hiking) {
    $name       = $hiking->name;
    $difficulty = $hiking->difficulty;
    $distance   = $hiking->distance;
    $duration   = $hiking->duration;
    $denivele   = $hiking->height_difference;
    $id         = $hiking->id;
    echo "<tr>
        <td>
        <a href='delete.php?id=".$id."' class='fa fa-trash delete' name='".$id."'aria-hidden='true'></a> | <a href='update.php?id=".$id."' class='fa fa-pencil edit' name='".$id."'aria-hidden='true' type='GET'></a>
 | </i> ".$name."</td>
        <td>".$difficulty."</td>
        <td>".$distance."</td>
        <td>".$duration."</td>
        <td>".$denivele."</td>
      </tr>";
};

?>
  <td><a class="btn btn-success" href="create.php"> + </a></td>
    </tbody>
    </table>
    </div>


<div class="container-fluid sep"></div>


<?php

?>
  </body>
</html>