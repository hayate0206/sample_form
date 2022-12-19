<?php
	require_once('./model.php');    //インポート
	require_once('./db.php');

	session_start();

    $model = $_SESSION['model'];
    $full_name = $model->getFull_name();
    $kana = $model->getKana();
    $gender = $model->getGender();
    $birth = $model->getBirth();
    $address = $model->getAddress();
    $phone = $model->getPhone();
    $mail = $model->getMail();
    $password = $model->getPassword();
    
    if(isset($_POST['registComplete'])){
        //データベース接続
        $db = new Db();

        //データベース登録
        $db->infoRegist(
            $full_name, 
            $kana, 
            $gender, 
            $birth, 
            $address, 
            $phone, 
            $mail, 
            $password
        );
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
	<h2>新規登録完了</h2>
 	<p><a href="login.php">ログイン画面へ</p>
</body>
</html>