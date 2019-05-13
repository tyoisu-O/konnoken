<?php 
try {
    $dsn = 'mysql:dbname=tyoi59_nandemo;host=mysql1.php.xdomain.ne.jp;charset=utf8';
    $user = 'tyoi59_data';
    $password = 't8a7y5n8';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


    $answers = [];

    $sql="SELECT*FROM ques_ans";//入力したデータを見る
    $results=$pdo->query($sql);
    foreach($results as $row){//$rowの中にはテーブルの列名が入る
        $id = $row['id'];
        $key = $row['name'];
        $value = $row['ans'];

        $answers[$key] = $value;
    }


} catch (PDOException $err) {
    echo $err -> getMessage() . " - " . $err -> getLine() . PHP_EOL;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="konnoken.css">
    <title>今野検 : 結果</title>
</head>
<body>
    <?php foreach($answers as $key => $value):  ?>
        <h1 class="output"><?php echo $key; ?> : <?php echo $value; ?></h1>
    <?php endforeach; ?>
</body>
</html>