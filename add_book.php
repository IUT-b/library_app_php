<?php
// require_once __DIR__ . "/token_check.php";
require_once __DIR__ . "/inc/functions.php";
// include __DIR__ . "/inc/error_check.php";
include __DIR__ . '/inc/header.php';
?>

<?php
try {
    $dbh = db_open();
    $sql = "INSERT INTO books (id,title,authors)
    VALUES(NULL,:title,:authors)";
    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(":title", $_POST["title"], PDO::PARAM_STR);
    $stmt->bindParam(":authors", $_POST["authors"], PDO::PARAM_STR);
    $stmt->execute();
    header("Location:index.php");
} catch (PDOException $e) {
    echo "エラー！：" . str2html($e->getMessage()) . "<br>";
    exit;
}
?>