<?php
session_start();
require_once __DIR__ . "/inc/functions.php";
include __DIR__ . "/inc/header.php";
?>


<div class="container">
    <h4>ユーザー登録</h4>

    <form method="post" action="./signup.php" enctype="multipart/form-data" novalidate="novalidate">
        <div class="mb-3">
            <label for="username" class="form-label">ユーザ名：</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Eメールアドレス：</label>
            <input type="text" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">パスワード：</label>
            <input type="text" name="password" class="form-control">
        </div>
        <input type="submit" value="新規登録">
    </form>



</div>