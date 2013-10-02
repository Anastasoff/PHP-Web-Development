<?php
$pageTitle = "Регистрация";
include("Includes/header.php");

if (isset($_SESSION['loggedIn'])) {
    header("Location: files.php");
}

if (isset($_POST['send'])) {
    $username = htmlspecialchars($_POST['username']);
    $username = str_replace(">", "", $username);

    $password = htmlspecialchars($_POST['password']);
    $password = str_replace(">", "", $password);

    if (strlen($username) < 3) {
        $error = "<div>Прекалено късо име!</div>";
    }

    if (strlen($password) <= 4) {
        $error = "<div>Прекалено къса парола!</div>";
    }

    $file = "Database/users.txt";
    $read = file($file);

    foreach ($read as $var) {
        $col = explode(">", $var);
        if ($col[0] == $username) {
            die("<div>Потребителя вече съществува! <a href='register.php'>Назад</a></div>");
        }
    }

    $newLine = $username.">".$password.PHP_EOL;
    $operation = file_put_contents("Database/users.txt", $newLine, FILE_APPEND);

    if ($operation) {
        $userDir = "Files/".$username;
        mkdir($userDir);
        echo "<div>Регистрацията мина успешно!</div>";
    }
    else {
        echo "<div>Регистрацията не мина успешно!</div>";
    }

    if (isset($error)) {
        echo $error;
    }
}
?>

<form method="POST">
    <div><b>Регистрация</b></div>
    <div>Потребителско име:</div>
    <input type="text" name="username" />
    <div>Парола:</div>
    <input type="password" name="password" />
    <br />
    <input type="submit" name="send" value="Регистрация" />&nbsp;&nbsp;<a href="index.php">Начало</a>
</form>

<?php
include("Includes/footer.php");
?>
