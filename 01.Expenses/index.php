<?php
$pageTitle = 'Списък';

include 'Includes/header.php';

if ($_POST) {
    $selectedGroup = 0;
    $selectedGroup = (int) $_POST['filter'];
}
?>
<a href ="expense.php">Добави разход</a>
<form method ="POST">
    <select name="filter">
        <?php
        echo '<option value = "0">Всички</option>';
        foreach ($groups as $key => $value) {
            echo '<option';
            if (isset($_POST['filter']) && $selectedGroup == $key) {
                echo ' selected ';
            }

            echo ' value="'.$key.'">'.$value.'</option>';
        }
        ?>
    </select>
    <input type="submit" value="Филтрирай" />
</form>

<table border ="1">
    <tr>
        <td>№</td>
        <td>Дата</td>
        <td>Име</td>
        <td>Сума</td>
        <td>Вид</td>
    </tr>
    <?php
    $filePath = "Database".DIRECTORY_SEPARATOR."expenses.txt";
    if (file_exists($filePath)) {
        $result = file($filePath);
        $selectedGroup = 0;
        if ($_POST) {
            $selectedGroup = (int) $_POST['filter'];
        }

        $sum = 0;
        $counter = 0;
        foreach ($result as $value) {
            $columns = explode('>', $value);
            if (count($columns) < 4) {
                continue;
            }

            if ($selectedGroup != $columns[3] && $selectedGroup != 0) {
                continue;
            }

            $counter++;
            $sum += (float) $columns[2];
            echo '<tr>
                    <td>'.$counter.'</td>
                    <td>'.$columns[0].'</td>
                    <td>'.$columns[1].'</td>
                    <td>'.number_format((float) $columns[2], 2, ',', ' ').'</td>
                    <td>'.$groups[trim($columns[3])].'</td>
                  </tr>';
        }

        echo '<tr>
                <td>'.'---'.'</td> 
                <td>'.'---'.'</td>
                <td>'.'---'.'</td>
                <td>'.number_format($sum, 2, ',', ' ').'</td>
                <td>'.'---'.'</td>
              </tr>';
    }
    ?>
</table>
<?php
include 'Includes/footer.php';
?>