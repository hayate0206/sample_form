<?php
require_once('./valid.php');
require_once('./data.php');

// 入力内容を無害化するセキュリティ対策
function escape($data){                 

    $data = trim($data);                //　文字列の先頭と末尾から「半角スペース」や「Tab」を取り除く
                                        //  文字列の中から文字を指定して削除
    $data = stripslashes($data);        //　バックスラッシュを取り除く（\' → ' ）
    $data = htmlspecialchars($data);    //　HTMLの文字を無害にする
    return $data;
}

if(isset($_POST['confirm'])){

    // POSTされたデータをエスケープ処理して変数に格納
    $mail = escape($_POST['mail']);
    $password = escape($_POST['password']);

    // ログイン時バリデーション
    $valid = new Valid();

    $emptyError = '必須入力です'; 
    $formatError = '正しい形式で入力してください'; 
    $passRangeError = '6~12文字で入力してください';
    $errors = [];

    
    if(empty($full_name)) {
        $errors['full_nameEmpty'] = $emptyError;
    }
    if(empty($kana)){
        $errors['kanaEmpty'] = $emptyError;
    }
    if(empty($mail)) {
        $errors["mailEmpty"] = $emptyError;
    }
    if(empty($gender)){
        $errors['genderEmpty'] = $emptyError;
    }
    if(empty($birth)) {
        $errors["birthEmpty"] = $emptyError;
    }
    if(empty($address)){
        $errors['addressEmpty'] = $emptyError;
    }
    if(empty($phone)){
        $errors['phoneEmpty'] = $emptyError;
    }
    if(empty($mail)) {
        $errors["mailEmpty"] = $emptyError;
    }
    if(empty($mail_confirm)){
        $errors['mail_confirmEmpty'] = $emptyError;
    }
    if(empty($password)){
        $errors['passwordEmpty'] = $emptyError;
    }
    if(empty($password_confirm)) {
        $errors["password_confirmEmpty"] = $emptyError;
    }
    if(!($valid->isFormat($mail, "mail"))){
        $errors['mailFormat'] = $formatError;
    }
    if(!($valid->isRange($password, 6, 12))){
        $errors['passwordRange'] = $passRangeError;
    }

    // 遷移
    // header('Location: ./registConfirm.php');
    // exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../sample.css">
<meta charset="UTF-8">
<title>REGISTER</title>
</head>
<body>
<h1>新規会員登録</h1>
<hr>
<form action="newMember.php" method="post">
    <div>
        <?php
            // 未入力
            if(
                isset($_POST['confirm']) 
                && array_key_exists('full_nameEmpty', $errors)
            ){
                echo '<p><font color="red">'.$errors['full_nameEmpty'].'</font></p>';
            }
        ?>
        <label for="full_name">名前</label>
        <input type="text" id="full_name" name="full_name">
    </div>
    <br>
    <div>
        <?php
            // 未入力
            if(
                isset($_POST['confirm']) 
                && array_key_exists('kanaEmpty', $errors)
            ){
                echo '<p><font color="red">'.$errors['kanaEmpty'].'</font></p>';
            }
        ?>
        <label for="kana">ふりがな</label>
        <input type="text" id="kana" name="kana">
    </div>
    <br>
    <div>
        <label for="gender">性別</label>
        <input type="radio" id="gender-male" name="gender" value="男性">男性
        <input type="radio" id="gender-female" name="gender" value="女性">女性
        <input type="radio" id="gender-other" name="gender" value="その他">その他
    </div>
    <br>
    <div>
        <?php
            // 未入力
            if(
                isset($_POST['confirm']) 
                && array_key_exists('birthEmpty', $errors)
            ){
                echo '<p><font color="red">'.$errors['birthEmpty'].'</font></p>';
            }
        ?>
        <label for="birth">生年月日</label>
        <input type="text" id="birth" name="birth">
    </div>
    <br>
    <div>
        <?php
            // 未入力
            if(
                isset($_POST['confirm']) 
                && array_key_exists('addressEmpty', $errors)
            ){
                echo '<p><font color="red">'.$errors['addressEmpty'].'</font></p>';
            }
        ?>
        <label for="address">住所</label>
        <input type="text" id="address" name="address">
    </div>
    <br>
    <div>
        <?php
            // 未入力
            if(
                isset($_POST['confirm']) 
                && array_key_exists('phoneEmpty', $errors)
            ){
                echo '<p><font color="red">'.$errors['phoneEmpty'].'</font></p>';
            }
        ?>
        <label for="phone">電話番号</label>
        <input type="text" id="phone" name="phone">
    </div>
    <br>
    <div>
        <?php
            // 未入力
            if(
                isset($_POST['confirm']) 
                && array_key_exists('mailEmpty', $errors)
            ){
                echo '<p><font color="red">'.$errors['mailEmpty'].'</font></p>';
            }
        ?>
        <label for="mail">メールアドレス</label>
        <input type="text" id="mail" name="mail">
    </div>
    <br>
    <div>
        <?php
            // 未入力
            if(
                isset($_POST['confirm']) 
                && array_key_exists('mail_confirmEmpty', $errors)
            ){
                echo '<p><font color="red">'.$errors['mail_confirmEmpty'].'</font></p>';
            }
        ?>
        <label for="mail_confirm">メールアドレス確認用</label>
        <input type="text" id="mail_confirm" name="mail_confirm">
    </div>
    <br>
    <div>
        <?php
            // 未入力
            if(
                isset($_POST['confirm']) 
                && array_key_exists('passwordEmpty', $errors)
            ){
                echo '<p><font color="red">'.$errors['passwordEmpty'].'</font></p>';
            }
        ?>
        <label for="password">パスワード</label>
        <input type="text" id="password" name="password">
    </div>
    <br>
    <div>
        <?php
            // 未入力
            if(
                isset($_POST['confirm']) 
                && array_key_exists('password_confirmEmpty', $errors)
            ){
                echo '<p><font color="red">'.$errors['password_confirmEmpty'].'</font></p>';
            }
        ?>
        <label for="password_confirm">パスワード確認用</label>
        <input type="text" id="password_confirm" name="password_confirm">
    </div>
    <hr>
    <div>
        <input type="submit" name="confirm" value="登録情報確認へ">
    </div>
</form> 
</body>
</html>