<?php

  if(isset($_POST['info'])){ 
    //データベース接続
    $db = mysqli_connect('localhost', 'root', 'root', 'sample_app2');
    if(mysqli_connect_errno()){
      echo "エラー";
    }else{
      echo "成功";
    }
    // テーブルのデータを取得する
    $query = "SELECT 
              full_name, 
              name_kana, 
              gender, 
              birth_date, 
              phone_number, 
              mail, 
              contact_input 
              FROM 
              sample_form
              LIMIT 1;
            ";

    // クエリを実行
    if ($result = mysqli_query($db, $query)) {
        // echo "SELECT に成功しました。\n";
        $row = [];
        foreach ($result as $row) {
          // echo $row["full_name"];
            // var_dump($row["full_name"]);
            // var_dump($row["name_kana"]);
            // var_dump($row["gender"]);
            // var_dump($row["birth_date"]);
            // var_dump($row["phone_number"]);
            // var_dump($row["mail"]);
            // var_dump($row["contact_input"]);
        }
    }
    // 接続を閉じる
    mysqli_close($db);
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>基本的な表の作成</title>
</head>
<body>
 <table>
    <tr>
      <td>名前</td>
      <td>
        <?= $row["full_name"], $row["name_kana"];?>
      </td>
    </tr>
    <tr>
      <td>性別</td>
      <td>
        <?= 
          $row["gender"] == 0 
            ? "男性"
            : "女性"
        ;
        ?>
      </td>
    </tr>
    <tr>
      <td>生年月日</td>
      <td><?= $row["birth_date"];?></td>
    </tr>
    <tr>
      <td>電話</td>
      <td><?= $row["phone_number"];?></td>
    </tr>
    <tr>
      <td>メールアドレス</td>
      <td><?= $row["mail"];?></td>
    </tr>
    <tr>
      <td>お問い合わせ内容</td>
      <td><?= $row["contact_input"];?></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="確認しました"></td>
    </tr>
  </table>
</body>
</html>