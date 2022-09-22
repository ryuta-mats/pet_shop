<?php
// 設定ファイルを読み込む
require_once __DIR__ . '/functions.php';

$keyword = '';
$flag = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $keyword = $_POST["keyword"];
}

if (empty($keyword)) {
    $animals = find_all();
    $flag = false;
} else {
    $keyword_parame =  '%' . $keyword . '%';
    $animals = find_description_by_keyword($keyword_parame);
}

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
    <form action="" method="post">
        <label for="keyword">キーワード:</label>
        <input id="keyword" name="keyword" type="text" placeholder="キーワードの入力" value="<?= $keyword ?>">
        <input type="submit" value="検索">
    </form>
    <?php if (!empty($animals)) : ?>
        <?php foreach ($animals as $animal) : ?>
            <p><?= $animal["type"] ?>の<?= $animal["classification"] ?>ちゃん</p>
            <p><?= $animal["description"] ?></p>
            <p><?= $animal["birthday"] ?>生まれ</p>
            <p>出身地 <?= $animal["birthplace"] ?></p>
            <hr>
        <?php endforeach; ?>
    <?php endif; ?>

</body>

</html>
