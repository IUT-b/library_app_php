<?php
require_once __DIR__ . '/login_check.php';
require_once __DIR__ . '/inc/functions.php';
include __DIR__ . '/inc/header.php';
?>
<?php
try {
    $dbh = db_open();
    $sql = 'SELECT * FROM libraries';
    $statement = $dbh->query($sql);
?>
    <div class="container">
        <h4>図書館をさがす</h4>

        <form action="./select_library.php" method="post" enctype="multipart/form-data" novalidate="novalidate" onclick="location.href='./select_library.php'">
            <div class="mb-3">
                <label for="pref" class="form-label">都道府県</label>
                <input type="text" name="pref" class="form-control">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">市区町村</label>
                <input type="text" name="city" class="form-control">
            </div>
            <div class="px-1">
                <form action="">
                    <input type="submit" value="検索">
                </form>
            </div>
        </form>



        <h4>登録している図書館</h4>
        <table class="table table-hover table-sm caption-top">
            <caption>List of libraries</caption>
            <thead>
                <tr>
                    <th scope="col">図書館</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $statement->fetch()) : ?>
                    <tr>
                        <td><?php echo str2html($row['formal'] . "(" . $row['systemname'] . ")") ?></td>
                        <td>
                            <div class="d-flex flex-row">
                                <div class="px-1">
                                    <form action="">
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