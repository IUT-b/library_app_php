<?php
session_start();
require_once __DIR__ . "/inc/functions.php";
include __DIR__ . "/inc/header.php";
?>


<div class="container">
    <h4>ログイン</h4>
    <form method="post" action="./login.php">
        <div class="mb-3">
            <label for="username" class="form-label">ユーザ名：</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">パスワード：</label>
            <input type="text" name="password" class="form-control">
        </div>
        <input type="submit" value="ログイン">
    </form>


    <?php
    if (!empty($_SESSION["login"])) {
        echo "ログイン済です<br>";
        echo "<a href=index.php>リストに戻る</a>";
        exit;
    }

    if ((empty($_POST["username"])) || (empty($_POST["password"]))) {
        echo "ユーザ名、パスワードを入力してください。";
        exit;
    }

    try {
        $dbh = db_open();
        $sql = "SELECT password FROM users WHERE username=:username";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":username", $_POST["username"], PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            echo "ログインに失敗しました";
            exit;
        }
    } catch (PDOException $e) {
        echo "エラー！：" . str2html($e->getMessage());
        exit;
    }
    if (password_verify($_POST["password"], $result["password"])) {
        session_regenerate_id(true);
        $_SESSION["login"] = true;
        $_SESSION["username"] = $_POST["username"];
        header("Location: index.php");
    } else {
        echo "ログインに失敗しました。(2)";
    }
    ?>
</div>