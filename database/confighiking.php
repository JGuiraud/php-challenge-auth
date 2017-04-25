<?php
    ORM::configure('mysql:host=localhost;dbname=reunion_island');
    ORM::configure('username', 'jerome2');
    ORM::configure('password', '12345');

    ORM::configure('return_result_sets', true); // returns result sets
    ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    ORM::configure('error_mode', PDO::ERRMODE_WARNING);
