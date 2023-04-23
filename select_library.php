<?php
require_once __DIR__ . '/login_check.php';
require_once __DIR__ . '/inc/functions.php';
include __DIR__ . '/inc/header.php';
?>


<?php
# appkeyの読み込み
$appkey = "aa009cb0d0a711236d89aedcb11bdb9a";
$pref = $_POST["pref"];
$city = $_POST["city"];

# 図書館検索
$url = "https://api.calil.jp/library";
$params = [
    "appkey"=> $appkey,
    "pref"=> $pref,
    "city"=> $city,
    "format"=> "json",
    "callback"=> "no",
];






        r = requests.get(url, params).json()
        session["libraries"] = r
        return redirect(url_for("detector.select_library"))

    user_libraries = (
        db.session.query(User, UserLibrary)
        .join(UserLibrary)
        .filter(User.id == UserLibrary.user_id)
        .all()
    )
    delete_form = DeleteForm()
    return render_template(
        "detector/search_library.html",
        form=form,
        user_libraries=user_libraries,
        delete_form=delete_form,
    )
    ?>

<div class="container">
    <h4>図書館の登録</h4>
    <p>登録する図書館を入力してください</p>



    <table class="table table-hover table-sm">
        <thead>
            <tr>
                <th scope="col">図書館</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            {% for library in session["libraries"] %}
            <tr>
                <td>{{library["formal"]}}（{{library["systemname"]}}）</td>
                <td>
                    <div class="d-flex flex-row">
                        <div class="px-1">
                            <form action="{{url_for('detector.registrate_library',systemid=library['systemid'])}}" method="POST">
                                {{ registrate_form.csrf_token }}
                                {{ registrate_form.submit(class="btn btn-primary btn-sm")}}
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>