<?php
require_once __DIR__ . '/login_check.php';
require_once __DIR__ . '/inc/functions.php';
include __DIR__ . '/inc/header.php';
?>
<?php
try {
    $dbh = db_open();
    $sql = 'SELECT * FROM books';
    $statement = $dbh->query($sql);
?>
    <div class="container">
        <h4>登録している本</h4>

        <table class="table table-hover table-sm caption-top">
            <caption>List of books</caption>
            <thead>
                <tr>
                    <th scope="col">タイトル</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $statement->fetch()) : ?>
                    <tr>
                        <td><?php echo str2html($row['title'] . "(" . $row['authors'] . ")") ?></td>
                        <td>
                            <div class="d-flex flex-row">
                                <div class="px-1">
                                    <form action="">
                                        <input type="submit" value="蔵書検索">
                                    </form>
                                </div>
                                <div class="px-1">
                                    <form action="./delete_book.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo (int)$row['id']; ?>">
                                        <input type="submit" value="削除">
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>



<?php
} catch (PDOException $e) {
    echo "エラー！：" . str2html($e->getMessage());
    exit;
}
?>
<?php include __DIR__ . '/inc/footer.php';
