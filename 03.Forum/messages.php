<?php
$pageTitle = "Съобщения | Начало";
include "includes/header.php";
?>
<table border="1" align="center">
    <?php include_once("includes/security.php"); ?>
    <tr>
        <th>Заглавие</th>
        <th>Съобщение</th>
        <th>От</th>
        <th>Дата</th>
    </tr>
    <?php
    $get = mysqli_query($connection, "SELECT * FROM messages ORDER BY date");
    while ($row = $get->fetch_assoc()) {
        ?>
        <tr align="center">
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['message']; ?></td>
            <td><?php echo $row['posted_by']; ?></td>
            <td><?php echo $row['date']; ?></td>
        </tr>
    <?php } ?>
</table>

<a style="float: right;" href="add.php">Ново съобщение</a>

<?php include_once("includes/footer.php"); ?>