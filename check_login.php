<?php
include './database/config.php';
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    header("location:read.php");
} else {
    header("location:index.php");
}
