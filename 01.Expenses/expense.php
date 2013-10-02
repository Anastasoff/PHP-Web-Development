<?php
mb_internal_encoding('UTF-8');
$pageTitle = 'Форма';

include 'Includes/header.php';

if ($_POST) {
    $name = trim($_POST['name']);
    $name = str_replace('>', '', $name);
    $cost = trim(str_replace(',', '.', $_POST['cost']));
    $cost = (float) str_replace('>', '', $cost);
    $selectedGroup = (int) $_POST['group'];
    $error = false;
    if (mb_strlen($name) < 3) {
        echo '<p>Името е прекалено късо!</p>';
        $error = true;
    }

    if ($cost <= 0) {
        echo '<p>Невалидна сума!</p>';
        $error = true;
    }

    if (!array_key_exists($selectedGroup, $groups)) {
        echo '<p>Невалидна група!</p>';
        $error = true;
    }

    $created = date('Y.m.d H:i:s');
    if (!$error) {
        $result = $created.' > '.$name.' > '.$cost.' > '.$selectedGroup."\n\r";
        if (file_put_contents("Database".DIRECTORY_SEPARATOR."expenses.txt", $result, FILE_APPEND)) {
            echo 'Записa е успешен!';
        }
    }
}
?>
<a href="index.php">Покажи списък</a>
<form method="POST">
    <table border="1">
        <tr>
            <td>Име: <input type="text" name="name" /></td>
            <td>Сума: <input type="text" name="cost" /></td>
            <td>
                <span>Вид: </span>
                <select name="group">
                    <?php
                    foreach ($groups as $key => $value) {
                        echo '<option value="'.$key.'">'.$value.'</option>';
                    }
                    ?>
                </select>
            </td>
            <td><input type="submit" value="Добави" /></td>
        </tr>
    </table>
</form>
<?php
include 'Includes/footer.php';
?>
