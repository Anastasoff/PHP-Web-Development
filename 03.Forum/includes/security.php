<?php

// Когато е ! мога да влезна, но не мога да се регистрирам
if (isset($_SESSION['logged'])) {
    header("Location: index.php");
}
?>