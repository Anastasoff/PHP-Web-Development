<?php
$pageTitle = "Ново съобщение | Съобщения";
include "includes/header.php";
?>

<?php include_once("includes/security.php"); ?>

<form method="post">
    <div>Заглавие:</div>
    <input type="text" name="title" />
    <div>Съдържание:</div>
    <textarea name="content"></textarea>
    <br />
    <input type="submit" name="go" value="Изпрати" />&nbsp;<a href="messages.php">Съобщения</a>
</form>

<?php
if (isset($_POST['go'])) {
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);

    if (strlen($title) == 0) {
        $error = "Заглавието не може да бъде 0 символа!";
    }

    if (strlen($title) > 50) {
        $error = "Ограничение за заглавие е 50 символа!";
    }

    if (strlen($title) == 0) {
        $error = "Текста не може да бъде празен!";
    }

    if (strlen($content) > 250) {
        $error = "Ограничение за текст е 250 символа!";
    }

    $today = date("d.m.y");
    $query = mysqli_query($connection, "INSERT INTO `messages` (`id`, `title`, `message`, `posted_by`, `date`) VALUES (NULL, '$title', '$content', '".$_SESSION['logged']."', '$today')");

    if (isset($error)) {
        echo $error;
    }
    else {
        if ($query) {
            header("Location: messages.php");
        }
        else {
            echo "Грешка!";
        }
    }
}
?>

<?php include_once("includes/footer.php"); ?>