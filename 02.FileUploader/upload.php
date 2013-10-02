<?php
$pageTitle = "Качи файл";
include_once("Includes/header.php");

if (isset($_SESSION['loggedIn'])) {
    if (isset($_POST['upload'])) {
        if ($_FILES) {
            if ($userPath == false) {
                $userPath = "Files/".$_SESSION['loggedIn'];
                mkdir($userPath);
            }

            if (move_uploaded_file($_FILES['forUpload']['tmp_name'], $userPath.DIRECTORY_SEPARATOR.$_FILES['forUpload']['name'])) {
                echo "<div>Файлът е качен!</div>";
            }
            else {
                echo "<div>Файлът не е качен!</div>";
            }
        }
    }
}
else {
    die("<div>Трябва да влезнете в системата, за да можете да качвате файлове! <a href='index.php'>Начало</a></div>");
}
?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="forUpload" />
    <input type="submit" name="upload" value="Качи" />
    <br />
    <a href="files.php">Качени файлове</a>
</form>

<?php
include_once("includes/footer.php");
?>