<?php
session_start();
if (isset($_SESSION['loggedIn']))
    $userPath = realpath("files/".$_SESSION['loggedIn']);
?>
<!DOCTYPE html>

<html>
    <head>
        <title><?= $pageTitle; ?></title>
        <meta charset="UTF-8">
    </head>

    <body>