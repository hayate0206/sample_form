<?php
  // error_reporting(0);                      // Warning非表示
	require_once('./data.php');
  
  $db = new Db();                             // データベース接続
  $data = $db->getContactAll();               // データベースから取得
  $connectionClose = $db->connectionClose();  // データベース切断
  
  $colNum = 3;                  // id, created_at, contact_input
  $contactNum  = count($data);  // データベースに登録されてるお問い合わせ情報数
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="sample.css">
<title>基本的な表の作成</title>
</head>
<body>
    <table border="1">
      <h2>管理者画面</h2>
      <tr>
        <td></td>
        <td>ID</td>
        <td>お問い合わせ時刻</td>
        <td>内容</td>
      </tr>
      <?php
        for($i = 0; $i < count($data); $i++){
      ?>
        <form action="detail.php" method="post">
          <tr>
            <td>
              <input type="checkbox" id="check">
            </td>
            <div class="check">
              <td>
                <?php echo $data[$i]["id"] ?>
              </td>
            </div>
            <div class="check">
              <td>
                <input type="hidden" name="id" value="<?php echo $data[$i]["id"]?>" />
                <button type="submit" name="info">
                  <?php echo $data[$i]["created_at"] ?>
                </button>
              </td>
            </div>
            <div class="check">
              <td>
                <?php echo $data[$i]["contact_input"] ?>
              </td>
            </div>
          </tr>
        </form>
      <?php 
      }
      ?>
    </table>
  
</body>
</html>