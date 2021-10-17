<?php
session_start();

if(!isset($_SESSION['isAdmin']) /*|| !isset($_POST['admin-submit'])*/) {
    header('Location: ../www/index.php');
    exit();
}