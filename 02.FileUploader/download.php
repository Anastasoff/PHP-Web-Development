<?php include_once("Includes/header.php"); ?>
    <?php
        $fileName = $_GET['file'];
        $fileName = 'Files/' . $_SESSION['loggedIn'] . "/" . $fileName;
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=" . basename($fileName));
        header("Content-Type: application/octet-stream");
        header("Content-Transfer-Encoding: binary");
        readfile($fileName);
    ?>
<?php include_once("Includes/footer.php"); ?>