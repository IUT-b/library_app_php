<?php
require_once __DIR__ . '/login_check.php';
require_once __DIR__ . '/inc/functions.php';
include __DIR__ . '/inc/header.php';
?>



<div class="container">
    <h4>本を探す</h4>
    <form action="./search_book.php" method="post" enctype="multipart/form-data" novalidate="novalidate">
        <div class="mb-3">
            <label class="form-label">タイトル</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">著者</label>
            <input type="text" name="author" class="form-control">
        </div>
        <div class="px-1">
            <form action="">
                <input type="submit" value="検索">
            </form>
        </div>
    </form>

    <h4>おすすめから探す</h4>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><a class="text-decoration-none link-dark" href={{url_for('detector.recommend_book',media_id='日経新聞書評' ,page=1 )}}>日経新聞書評</a>
        </li>
        <li class="list-group-item"><a class="text-decoration-none link-dark" href={{url_for('detector.recommend_book',media_id='本屋大賞' ,page=1 )}}>本屋大賞</a>
        </li>
        <li class="list-group-item"><a class="text-decoration-none link-dark" href={{url_for('detector.recommend_book',media_id='ブックオフ' ,page=1 )}}>ブックオフ ベストセラー！名著特集</a>
        </li>
    </ul>


    <h4>本を登録する</h4>
    <form action="./add_book.php" method="post" enctype="multipart/form-data" novalidate="novalidate">
        <div class="mb-3">
            <label class="form-label">タイトル</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">著者</label>
            <input type="text" name="authors" class="form-control">
        </div>
        <div class="px-1">
            <form action="">
                <input type="submit" value="登録">
            </form>
        </div>
    </form>
</div>