<?php
require_once('./data.php');
$data;
  if(isset($_POST['info'])){
    $id = $_POST["id"];
    $db = new Db();                             // データベース接続
    $data = $db->getUserDetail($id);               // データベースから取得
    $connectionClose = $db->connectionClose();  // データベース切断
  }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="sample.css">
<title>基本的な表の作成</title>
</head>
<body>
 <table>
    <tr>
      <td>名前</td>
      <td>
        <?= $data["full_name"];?>
      </td>
    </tr>
    <tr>
      <td>ふりがな</td>
      <td>
        <?= $data["name_kana"];?>
      </td>
    </tr>
    <tr>
      <td>性別</td>
      <td>
        <?= 
          $data["gender"] == 0 
            ? "男性"
            : "女性"
        ;
        ?>
      </td>
    </tr>
    <tr>
      <td>生年月日</td>
      <td><?= $data["birth_date"];?></td>
    </tr>
    <tr>
      <td>電話</td>
      <td><?= $data["phone_number"];?></td>
    </tr>
    <tr>
      <td>メールアドレス</td>
      <td><?= $data["mail"];?></td>
    </tr>
    <tr>
      <td>お問い合わせ内容</td>
      <td><?= $data["contact_input"];?></td>
    </tr>
    <form action="index.php" method="post">
      <tr>
          <td></td>
          <td><input type="submit" name="check" value="確認しました"></td>
      </tr>
    </form>
  </table>
</body>
</html>