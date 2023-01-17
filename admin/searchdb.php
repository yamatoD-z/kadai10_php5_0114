<?php
session_start();
require_once('../funcs.php');
require_once('../common/head_parts.php');
require_once('../common/header_nav.php');
loginCheck();

$search_name = '%'.$_POST["search_name"].'%';
$bold_search_name = "<strong><font color = 'red'>".$_POST["search_name"]."</font></strong>";

$pdo = db_conn();
$stmt = $pdo->prepare("SELECT * FROM gs_content_table  WHERE  content LIKE :search_name");
$stmt->bindValue(':search_name',$search_name,PDO::PARAM_STR);
$status = $stmt->execute();

?>

<html>

<head>
    <?= head_parts('検索する') ?>
</head>

<body>
    <?= $header_nav ?>

    <table class='border  border-primary'>
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Content</th>
        </tr>
        <!-- ここでPHPのforeachを使って結果をループさせる -->
        <?php foreach ($stmt as $row): ?>
        <?php $boldterm = str_replace($_POST["search_name"], $bold_search_name,$row[2]) ?>
        <tr>
            <td class='border  border-primary'><?php echo $row[1]?>
            </td>
            <td class='border  border-primary'><?php echo $row[4]?></td>
            <td class='border  border-primary'><?php echo $boldterm?></td>
        </tr>

        <?php endforeach; ?>
    </table>
</body>

</html>