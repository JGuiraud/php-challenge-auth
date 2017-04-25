<?php

require_once 'vendor/autoload.php';
ORM::configure('mysql:host=localhost;dbname=challengeAuth');
ORM::configure('username', 'jerome2');
ORM::configure('password', '12345');

$users = ORM::for_table('user')->find_many();
if ($users) {
    echo 'Connection with database okay';
} else {
    echo 'Error';
}
