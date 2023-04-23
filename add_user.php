<?php
// require_once __DIR__ . "/token_check.php";
require_once __DIR__ . "/inc/functions.php";
// include __DIR__ . "/inc/error_check.php";
include __DIR__ . '/inc/header.php';
?>

<?php
try {
    $dbh = db_open();
    $sql = "INSERT INTO users (id,username,email,password)
    VALUES(NULL,:username,:email,:password)";
    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(":username", $_POST["username"], PDO::PARAM_STR);
    $stmt->bindParam(":email", $_POST["email"], PDO::PARAM_STR);
    $stmt->bindParam(":password", password_hash($_POST["password"], PASSWORD_DEFAULT), PDO::PARAM_STR);
    $stmt->execute();

    header("Location:index.php");
} catch (PDOException $e) {
    echo "エラー！：" . str2html($e->getMessage()) . "<br>";
    exit;
}
?>