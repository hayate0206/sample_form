<?php
  require_once('./db.php');

  $data;
  if(isset($_POST['info'])){
    $id = $_POST["id"];
    $db = new Db();                             // データベース接続
    $data = $db->getUserDetail($id);            // データベースから取得
    $connectionClose = $db->connectionClose();  // データベース切断
    
  }
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <table>
    <h1>お客様情報詳細</h1>
    <form action="index.php" method="post">
      <tr>
        <td>ID</td>
        <td>
          <?= $data["id"];?>
        </td>
      </tr>
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
        <td>パスワード</td>
        <td><?= $data["password"];?></td>
      </tr>
      <tr>
          <td></td>
          <td>
            <input type="hidden" name="id" value="<?php echo $data["id"]?>" />
            <input type="submit" name="check" value="確認しました">
          </td>
      </tr>
    </form>
  </table>
</body>
</html>