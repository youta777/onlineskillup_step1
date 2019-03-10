<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>PHPのサンプル</title>
    </head>
    <body>
        <?php
            // commentがPOSTされているなら
            if(isset($_POST["comment"])){
                //エスケープしてから表示
                $name = htmlspecialchars($_POST["name"]);
                $comment = htmlspecialchars($_POST["comment"]);
                print("${name}さんのコメントは「${comment}」です。");
            }else{
        ?>
            <form action="index.php" method="POST">
                <p>名前を入力</p>
                <input name="name" />
                <p>コメントを入力</p>
                <input name="comment" />
                <input type="submit" value="送信" />
            </form>
        <?php
            }
        ?>
    </body>
</html>
