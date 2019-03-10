<?php
$dsn = 'pgsql:dbname=TEST;host=pgsql;port=5432';
$user = 'postgres';
$pass = 'example';

try {
    //DBに接続
    $dbh = new PDO($dsn, $user, $pass);

    //クエリの実行
    // (1) queryメソッド(select)
    $query_result = $dbh->query('SELECT * FROM test_comments');

    // (2) prepareメソッド(select)
    $sth_select = $dbh->prepare('SELECT * FROM test_comments WHERE name=?');

    //prepareメソッド(insert)
    $sth = $dbh->prepare('INSERT INTO test_comments(name, text) VALUES(?, ?)');

    //DBの切断
    $dbh = null;
} catch (PDOException $e) {
    //接続にエラーが発生した場合ここに入る
    print "DB ERROR:" . $e->getMessage() . "<br />";
    die();
}
?>

<!-- select(query)の結果表示 -->
<?php
    foreach($query_result as $row) {
        print $row["name"] . ": " . $row["text"] . "<br />";
    }
?>

<!-- select(prepare)の結果表示 -->
<?php
    $name = "john";
    $sth_select->execute(array($name));
    $prepare_result = $sth_select->fetchAll();
    foreach($prepare_result as $row) {
        print $row["name"] . ": " . $row["text"] . "<br />";
    }
    $sth_select->execute(array($name));
?>  

<!-- insertの結果表示 -->
<?php
    $name = "john";
    $text = "Power to the People";
    $sth->execute(array($name, $text));
?>