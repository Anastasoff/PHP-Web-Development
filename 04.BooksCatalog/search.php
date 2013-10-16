<?php
$pageTitle = "Търси";
include 'includes/header.php';
?>

<form method="GET">
    <label for="bookname">Име на книгата:</label>
    <input type="text" value="<?php if (isset($_POST ['submit']) && $_POST['book'] != '') echo $_POST['book']; ?>" name='book' />
    <input type="submit" value="Търси" />
</form>

<?php
if (isset($_GET['book'])) {
    $book = sanitizeQuery($_GET['book']);
    $book = mysqli_real_escape_string($connection, $book);
    $query = "SELECT * FROM books_authors
        LEFT JOIN authors ON authors.author_id = books_authors.author_id
        LEFT JOIN books ON books_authors.book_id = books.book_id
        WHERE books.book_title LIKE '%$book%'";

    $result = mysqli_query($connection, $query);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $foundBooks = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $foundBooks[$row['book_id']]['book'] = $row ['book_title'];
                $foundBooks[$row['book_id']]['authors'][$row['author_id']] = $row['author_name'];
            }
            ?>
            <table border="1">
                <tr>
                    <th>Книга</th>
                    <th>Автори</th>
                </tr>
                <?php foreach ($foundBooks as $book) { ?>
                    <tr>
                        <td><?= $book['book'] ?></td>
                        <td>
                            <?php foreach ($book['authors'] as $authorId => $authorName) { ?>                            
                                <a href="all_author_books.php?author_id=<?= $authorId ?>"><?= $authorName ?></a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <?php
        }
        else {
            echo "<p>Няма намерена книга!</p>";
        }
    }
}

include 'includes/footer.php';