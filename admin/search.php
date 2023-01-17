<?php
session_start();
require_once('../funcs.php');
require_once('../common/head_parts.php');
require_once('../common/header_nav.php');
loginCheck();

$pdo = db_conn();
$stmt = $pdo->prepare('SELECT * FROM gs_content_table');
$status = $stmt->execute();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <?= head_parts('検索する') ?>
</head>

<body>
    <?= $header_nav ?>
    <form action="searchdb.php" method="post">
        <input type="text" name="search_name" value='コロナ'>
        <input type="submit" name="submit" value="検索する">
        ※例として、コロナというキーワードを入れています
</body>