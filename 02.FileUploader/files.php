<?php
$pageTitle = "Файлове";
include("Includes/header.php");

if (isset($_SESSION['loggedIn'])) {
    echo "<div>Добре дошъл, <b>".$_SESSION['loggedIn']."</b>! <a href='logout.php'>Излез?</a></div>";
    echo "<div><a href='upload.php'>Качи нов файл</a></div>";

    $content = scandir($userPath);
}
else if (!isset($_SESSION['loggedIn'])) {
    die("<div>Трябва да се впишете в системата за да видите тази страница! <a href='index.php'>Назад</a></div>");
}

if (count($content) <= 2) {
    echo "<div>Няма качени твои файлове!</div>";
}
else {
    ?>
    <table border="1">
        <tr>
            <th>Име:</th>
            <th>Размер:</th>
        </tr>
        <?php
        for ($index = 2; $index < count($content); $index++) {
            $size = filesize($userPath.DIRECTORY_SEPARATOR.$content[$index]) / 1024;
            $link = '<a href="download.php?file='.$content[$index].'" >'.$content[$index].'</a>';
            ?>
            <tr>
                <td><?php echo $link; ?></td>
                <td><?php echo (int) $size." KB"; ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
}
?>
<?php
include("Includes/footer.php");
?>