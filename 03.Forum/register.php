<?php
$pageTitle = "Регистрация";
include_once("includes/header.php");
?>

<table align="center">
    <?php include "includes/security.php"; ?>
    <tr>
        <td>
            <form method="post">
                <div>Потребител:</div>
                <input type="text" name="username" />
                <div>Парола:</div>
                <input type="password" name="password" />
                <br />
                <input type="submit" name="go" value="Регистрация" />&nbsp;<a href="index.php">Начало</a>
            </form>
        </td>
    </tr>
</table>

<table align="center">
    <tr>
        <th>
            <?php
            if (isset($_POST['go'])) {
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);

                if (strlen($username) < 5) {
                    $error = true;
                    echo "Името трябва да е поне 5 символа!".'<br>';
                }

                if (strlen($password) < 5) {
                    $error = true;
                    echo "Паролата трябва да е поне 5 символа!".'<br>';
                }

                $check = mysqli_query($connection, "SELECT username FROM users WHERE username = '$username'");
                $result = $check->num_rows;

                if ($result > 0) {
                    $error = true;
                    echo "Вече съществува такъв потребител!".'<br>';
                }

                if (!isset($error) && $result == 0) {
                    $insert = mysqli_query($connection, "INSERT INTO `users`(`id`, `username`, `password`) VALUES (NULL, '$username', '$password')");

                    if ($insert) {
                        //echo "Регистрацията е успешна! Влез <a href='index.php'>тук</a>!";
                        header("Location: index.php");
                    }
                    else {
                        echo "Грешка при регистрацията!";
                    }
                }
            }
            ?>
        </th>
    </tr>
</table>

<?php include_once("includes/footer.php"); ?>