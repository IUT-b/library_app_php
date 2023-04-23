<?php
try {
    $dbh = db_open();
    $sql = 'SELECT * FROM libraries';
    $statement = $dbh->query($sql);
?>
    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./bootstrap.css">
        <title>書籍データベース</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light px-4" style="background-color: #e3f2fd;">
            <a class="navbar-brand" href="./index.php">Library Assistant</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggleExternalContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./search_book.php">本を探す</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./search_library.php">図書館を登録</a>
                    </li>
                    <?php if (!empty($_SESSION["login"])) : ?>
                        <li class="nav-iten">
                            <span class="nav-link text-secondary">
                                <?php echo str2html($_SESSION['username']) ?>
                            </span>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="./logout.php">ログアウト</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./signup.php">新規登録</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./login.php">ログイン</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    <?php
} catch (PDOException $e) {
    echo "エラー！：" . str2html($e->getMessage());
    exit;
}
    ?>