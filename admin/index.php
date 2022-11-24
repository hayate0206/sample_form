<?php
	require_once('./data.php');

    //データベース接続
    $db = mysqli_connect('localhost', 'root', 'root', 'sample_app2');
    if(mysqli_connect_errno()){
      echo "エラー";
    }else{
      echo "成功";
    }
    // テーブルのデータを取得する
    $query = "SELECT created_at FROM sample_form;";

    // クエリを実行
    if ($result = mysqli_query($db, $query)) {
        echo "SELECT に成功しました。\n";
        $row = [];
        foreach ($result as $row) {
          echo $row["created_at"];
          // var_dump($row["created_at"]);
        }
    }
    // 接続を閉じる
    mysqli_close($db);
?>
<!DOCTYPE html>
<html>
<head>
<title>基本的な表の作成</title>
</head>
<body>
  
    <table border="1">
      <tr>
        <th>お問い合わせ時刻</th>
        <th>内容</th>
      </tr>
      <form action="detail.php" method="post">
        <tr>
          <td>
            <button type="submit" name="info"><?php if(isset($row) !== ""){ echo $row["created_at"];}?></button>
          </td>
          <td>ログインでき...</td>
        </tr>
      </form>  
      <tr>
        <td>1999年11月21日(月) 19:47:32</td>
        <td>xxxxx...</td>
      </tr>
    </table>
  
</body>
</html>