<?php
	require_once('./db.php');
  
  $db = new Db();                             // データベース接続
  $data = $db->getContactInfo();              // データベースから取得
  $connectionClose = $db->connectionClose();  // データベース切断
  $background_color = [];
  if(isset($_POST['check']) && $_POST['check'] == "確認しました"){     // detail.phpで確認ボタンが押されたとき
    $check_color = 0;
    $id = $_POST['id'];
    $db = new Db();                                             // データベース接続
    $checkData = $db->infoCheck($id);                           // データベース更新
    $connectionClose = $db->connectionClose();                  // データベース切断
  }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../sample.css">
<script src="sample.js"></script>
<title>基本的な表の作成</title>
</head>
<body>
  <table border="1">
    <h2>管理者画面</h2>
    <tr>
      <td></td>
      <td>ID</td>
      <td>新規会員登録日時</td>
    </tr>
    <?php
      for($i = 0; $i < count($data); $i++){
    ?>
      <form action="detail.php" method="post">
        <?php
          if($data[$i]["check_color"] == 1){
          echo '<tr class="confirmed">'; 
          }else{
            echo "<tr>";
          }
        ?>
          <td>
            <input type="checkbox" id="check">
          </td>
          <div>
            <td>
              <?php echo $data[$i]["id"] ?>
            </td>
          </div>
          <div>
            <td>
              <input type="hidden" name="id" value="<?php echo $data[$i]["id"]?>" />
              <button type="submit" name="info" onclick="checkColor('#3fb811');">
                <?php echo $data[$i]["created_at"] ?>
              </button>
            </td>
          </div>
        </tr>
      </form>
    <?php 
    }
    ?>
  </table>
  <!-- 詳細情報を確認したら色を変える（既読機能） -->
  <script>
    window.onload = function() {
      const rows = document.getElementsByClassName("confirmed");
      for (let i = 0; i < rows.length; i++) {
          rows[i].style.backgroundColor = "#90ee90";
      }
    };
  </script>
  <p></p>
  <hr>
  <form action="index.php" method="post">
    <div>
      <button class="trash-box" onclick="doSomething()">ゴミ箱</button>
    </div>
  </form>
</body>
</html>