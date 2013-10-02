<?php
$pageTitle = "Начало";
include("Includes/header.php");
?>
<form method="POST">
    <div><b>Вход</b></div>
    <div>Потребителско име:</div>
    <input type="text" name="username" />
    <div>Парола:</div>
    <input type="password" name="password" />
    <br />
    <input type="submit" name="login" value="Влез" />&nbsp;&nbsp;<a href="register.php">Регистрация</a>        
</form>
<?php
if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $isLogged = false;
    $error = '';
    if (file_exists("Database/users.txt")) {
        $fetch = file("Database/users.txt");

        foreach ($fetch as $value) {
            $record = explode(">", $value);
            $getUser = trim($record[0]);
            $getPassword = trim($record[1]);

            if ($username == $getUser && $password == $getPassword) {
                $_SESSION['loggedIn'] = $username;
                $isLogged = true;
                header("Location: files.php");
                exit;
            }
        }
        if ($isLogged == false) {
            $error = '<div>Грешно потребителско име или парола!</div>';
        }
    }
    else {
        $error = '<div>Файл users.txt не съществува!</div>
            <div>Моля направете си <a href="register.php">регистрация</a>!</div>';
    }

    if ($error) {
        echo $error;
    }
}
else if (isset($_SESSION['loggedIn'])) {
    header("Location: files.php");
}
?>
<?php
include("Includes/footer.php");
?>