<?php
// require_once __DIR__ . "/token_check.php";
require_once __DIR__ . "/inc/functions.php";
// include __DIR__ . "/inc/error_check.php";
include __DIR__ . '/inc/header.php';
?>

<?php
try {
    $dbh = db_open();
    $sql = "DELETE FROM books WHERE id=:id";
    $stmt = $dbh->prepare($sql);
    $id = (int)$_POST['id'];
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    header("Location:index.php");
} catch (PDOException $e) {
    echo "エラー！：" . str2html($e->getMessage()) . "<br>";
    exit;
}
?>