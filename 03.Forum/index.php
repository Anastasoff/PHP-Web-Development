<?php
$pageTitle = "Начало";
include "includes/header.php";
?>

<table align="center">
    <tr>
        <?php
        if (isset($_SESSION['logged'])) {
            header("Location: messages.php");
        }
        ?>
        <td>
            <form method="post">
                <div>Потребител:</div>
                <input type="text" name="username" />
                <div>Парола:</div>
                <input type="password" name="password" />
                <br />
                <input type="submit" name="go" value="Влез" /> &nbsp; <a href="register.php">Регистрация</a>
            </form>
        </td>
    </tr>
</table>

<table align="center">
    <tr>
        <td>
            <?php
            if (isset($_POST['go'])) {
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);                
                
                if (strlen($username) < 5) {
                    $error = "Името е по-късо от 5 символа!";
                }

                if (strlen($password) < 5) {
                    $error = "Паролата е по-къса от 5 символа!";
                }

                $check = mysqli_query($connection, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
                $num = $check->num_rows;

                if ($num != 0) {
                    $_SESSION['logged'] = $username;
                    header("Location: messages.php");
                }
                else {
                    $error = "Грешно потребителско име или парола!";
                }

                if (isset($error)) {
                    echo $error;
                }
            }
            ?>
        </td>
    </tr>
</table>

<?php
include_once("includes/footer.php");
?>