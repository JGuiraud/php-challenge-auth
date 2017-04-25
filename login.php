<?php
session_start();
include './database/config.php';
// if (!isset($_SESSION["username"]) && !isset($_SESSION['password'])) {
//     header("location:index.php");
// } else {
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>

<h3>Log in</h3>

    <form action="" method="post">
      <div>
        <label for="username">Identifiant</label>
        <input type="text" name="username" required value="abc">
      </div>
      <div>
        <label for="password">Mot de passe </label>
        <input type="password" name="password" required value="123">
      </div>
      <div>
        <button type="submit" name="button">Se connecter</button>
      </div>
    </form>

<?php

if (isset($_POST['button'])) {
    $username = $_POST['username'];
    $pwd      = sha1($_POST['password']);

    $checkForCredentials = ORM::for_table('user')
                               ->where(array(
                                 'username' => $username,
                                 'password' => $pwd
                               ))
                               ->find_many();

    if ($checkForCredentials) {
        $_SESSION['username']=$username;
        $_SESSION['password']=$pwd;
        $_SESSION['page']="create.php";
        header("location:check_login.php");
    } else {
        echo 'problem';
    }
};
// }
?>



  </body>
</html>
