<?php
    require_once('./model.php');    //インポート

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

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<title>お問い合わせ内容確認画面</title>
</head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>入力内容の確認</title>
    </head>
    <body>
        <form action="registComplete.php" method="post">
            <h2 >入力内容の確認</h2>
            <div class="contact-detail">
                <p><h3>【お名前】</h3></p>
                <?php echo $full_name;?>
            </div>
            <div class="contact-detail">
                <p><h3>【ふりがな】</h3></p>
                <?php echo $kana;?>
            </div>
            <div class="contact-detail">
                <p><h3>【性別】</h3></p>
                <?php echo $gender;?>
            </div>
            <div class="contact-detail">
                <p><h3>【生年月日】</h3></p>
                <?php echo $birth;?>
            </div>
            <div class="contact-detail">
                <p><h3>【住所】</h3></p>
                <?php echo $address;?>
            </div>
            <div class="contact-detail">
                <p><h3>【電話番号】</h3></p>
                <?php echo $phone;?>
            </div>
            <div class="contact-detail">
                <p><h3>【メールアドレス】</h3></p>
                <?php echo $mail;?>
            </div>
            <div class="contact-detail">
                <p><h3>【パスワード】</h3></p>
                <?php echo $password;?>
            </div>
            <div class="contact-detail">
                <!-- 送信ボタン,戻るボタン(入力内容を保持) -->
                <p> この内容で送信しますか？</p>
                <form method="post" action="complete.php">
                <button type="submit" name="registComplete" value="登録">登録</button>
                <button type="button" onclick=history.back()>戻る</button>
            </div>
        </form>
    </body>
</html>
