<?php
require '../partials/header.php';



if (!isset($_SESSION['userId'])) {
    header('location: ' . ROOT_URL . 'signIn.php');
    die();
}