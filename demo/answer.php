<?php

try {
    $dsn = 'mysql:dbname=tyoi59_nandemo;host=mysql1.php.xdomain.ne.jp;charset=utf8';
    $user = 'tyoi59_data';
    $password = 't8a7y5n8';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $number = $_POST["example"];
    $answer = $_POST["ans"];
    $btn = $_POST["btn"];

    //テーブル削除
    //$sql_dt = "DROP TABLE IF EXISTS ques_ans";
    //$pdo -> exec($sql_dt);

    $sql_table="CREATE TABLE IF NOT EXISTS ques_ans"
    ."("
    ."id mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,"
    ."PRIMARY KEY(id),"//主キーの設定(被らない情報を主キーにする)
    ."name char(16),"//班名
    ."ans char(32)"//回答
    .");";

    //テーブル作成の命令文
    $stmt=$pdo->query($sql_table);

    if (!empty($answer)) {
        $output ="※確認「" . $answer . "」送信しました"; 

        $sql_in=$pdo->prepare("INSERT INTO ques_ans(name,ans)VALUES(:name,:ans)");
        $sql_in->bindParam(':name',$number,PDO::PARAM_STR);
        $sql_in->bindParam(':ans',$answer,PDO::PARAM_STR);
        $sql_in->execute();


        // $sql = 'update ques_ans set where name =:name ans = :ans';
        // $stmt = $pdo -> prepare($sql);
        // $stmt->bindParam(':name', $number, PDO::PARAM_STR);
        // $stmt->bindValue(':ans', $answer, PDO::PARAM_INT);
        // $stmt->execute();
    }


} catch (PDOException $err) {
    echo $err -> getMessage() . " - " . $err -> getLine() . PHP_EOL;
}



?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="konnoken.css">
    <title>今野検 : 解答フォーム</title>
</head>
<body>
    <form action="answer.php" method="post">
        <header>
            <h2>今野<font style="color: red;">検</font> 解答フォーム</h2>
            <img src="konnoken_logo.png" height="40" width="50">
        </header>
        <div class="main">
            <select name="example">
                <option value="1班">1班</option>
                <option value="2班">2班</option>
                <option value="3班">3班</option>
            </select>
            <input type="text" class="answer" name="ans">
            <input type="submit" class="answer_btn" value="送信" name="btn">
            <?php if(!empty($output)): ?>
                <p><?php echo $output; ?></p>
            <?php endif; ?>
        </div>
        <footer>

        </footer>
        </form>
</body>
</html>