<?php
$pageTitle = "Книги от автор";
include 'includes/header.php';
?>

<?php
if ($_GET) {
    $authorId = (int) $_GET['author_id'];
    $sql = 'SELECT books.book_id, books.book_title, authors.author_name, authors.author_id FROM books
LEFT JOIN books_authors ba ON ba.book_id = books.book_id
LEFT JOIN authors ON ba.author_id = authors.author_id
LEFT JOIN books_authors ba2 ON ba2.book_id = books.book_id
WHERE ba2.author_id = "'.$authorId.'"';
    $query = mysqli_query($connection, $sql);
    if (!$query) {
        echo 'Connection problem';
        echo mysqli_error($connection);
        exit;
    }
    $books = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $books[$row['book_id']]['title'] = $row['book_title'];
        $books[$row['book_id']]['authors'][$row['author_id']] = $row['author_name'];
    }
    $countBooks = count($books);
}

if ($countBooks > 0) {
    ?>
    <table border="1">
        <tr>
            <th>Книга</th>
            <th>Автори</th>
        </tr>
        <?php foreach ($books as $book) { ?>
            <tr>
                <td><?= $book['title'] ?></td>
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
    ?>
    <p>Няма такъв автор</p>
    <?php
}
include 'includes/footer.php';