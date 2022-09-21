<?php
// 設定ファイルを読み込む
require_once __DIR__ . '/functions.php';

$animals = find_all();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>本日のご紹介ペット！</h1>
    <?php foreach ($animals as $animal) : ?>
        <p><?= $animal["type"] ?>の<?= $animal["classification"] ?>ちゃん</p>
        <p><?= $animal["description"] ?></p>
        <p><?= $animal["birthday"] ?>生まれ</p>
        <p>出身地 <?= $animal["birthplace"] ?></p>
        <hr>
    <?php endforeach; ?>
</body>

</html>
