<?php
$number = $_POST["example"];
$answer = $_POST["ans"];
$btn = $_POST["btn"];


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="konnoken.css">
    <title>今野検 解答フォーム</title>
</head>
<body>
    <form action="answer.php" method="post">
        <header>
            <h2>今野検 解答フォーム</h2>
        </header>
        <div class="main">
            <select name="example">
                <option value="1班">1班</option>
                <option value="2班">2班</option>
                <option value="3班">3班</option>
            </select>
            <input type="text" class="answer" name="ans">
            <input type="submit" class="answer_btn" value="送信" name="btn">
        </div>
        <footer>

        </footer>
        </form>
</body>
</html>