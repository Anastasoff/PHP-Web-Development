<?php
session_start();
?>
<!DOCTYPE html>
<?php
require "config/config.php";
?>
<html>
    <head>
        <title><?= $pageTitle; ?></title>
        <meta charset="UTF-8">
    </head>
    <body>
        <div style="float:right;">
            <?php
            if (isset($_SESSION['logged'])) {
                ?>
                Здравей, <?php echo $_SESSION['logged']; ?>!&nbsp;<a href="logout.php">Излез?</a>
                <?php
            }
            else {
                ?>
                <a href="index.php">Влез</a>
                <?php
            }
            ?>
        </div>