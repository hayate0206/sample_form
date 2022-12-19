<?php
require_once('./Valid.php');
require_once('./db.php');
require_once('./model.php');

// 入力内容を無害化するセキュリティ対策
function escape($data){                 

    $data = trim($data);                //　文字列の先頭と末尾から「半角スペース」や「Tab」を取り除く
                                        //  文字列の中から文字を指定して削除
    $data = stripslashes($data);        //　バックスラッシュを取り除く（\' → ' ）
    $data = htmlspecialchars($data);    //　HTMLの文字を無害にする
    return $data;
}

if(isset($_POST['confirm'])){

    // 登録時バリデーション
    $valid = new Valid();

    // POSTされたデータをエスケープ処理して変数に格納
    $full_name = escape($_POST['full_name']);
    $kana = escape($_POST['kana']);
    $gender = escape($_POST['gender']);
    $birth = escape($_POST['birth']);
    $address = escape($_POST['address']);
    $phone = escape($_POST['phone']);
    $mail = escape($_POST['mail']);
    $mail_confirm = escape($_POST['mail_confirm']);
    $password = escape($_POST['password']);
    $password_confirm = escape($_POST['password_confirm']);

    // 登録時バリデーション
    $valid = new Valid();

    $emptyError = '必須入力です'; 
    $formatError = '正しい形式で入力してください'; 
    $RangeError = '6~12文字で入力してください';
    $MatchError = '入力内容を一致させてください';
    $errors = [];

    // --- 未入力 ---
    if(empty($full_name)){
        $errors['full_nameEmpty'] = $emptyError;
    }
    if(empty($kana)){
        $errors['kanaEmpty'] = $emptyError;
    }
    if(empty($birth)) {
        $errors['birthEmpty'] = $emptyError;
    }
    if(empty($address)){
        $errors['addressEmpty'] = $emptyError;
    }
    if(empty($phone)){
        $errors['phoneEmpty'] = $emptyError;
    }
    if(empty($mail)) {
        $errors['mailEmpty'] = $emptyError;
    }
    if(empty($mail_confirm)){
        $errors['mail_confirmEmpty'] = $emptyError;
    }
    if(empty($password)){
        $errors['passwordEmpty'] = $emptyError;
    }
    if(empty($password_confirm)) {
        $errors['password_confirmEmpty'] = $emptyError;
    }

    // --- 形式チェック ---
    if(!($valid->isFormat($birth, "birth"))){
        $errors['birthFormat'] = $formatError;
    }
    if(!($valid->isFormat($phone, "phone"))){
        $errors['phoneFormat'] = $formatError;
    }
    if(!($valid->isFormat($mail, "mail"))){
        $errors['mailFormat'] = $formatError;
    }

    // --- 文字数チェック ---
    if(!($valid->isRange($password, 6, 12))){
        $errors['passwordRange'] = $RangeError;
    }

    // --- Eメールアドレス,パスワードが確認用と一致するかどうか ---
    if($valid->isMatch($mail, $mail_confirm)){
        $errors['mailMatch'] = $MatchError;
    }
    if($valid->isMatch($password, $password_confirm)){
        $errors['passwordMatch'] = $MatchError;
    }

    // エラーの数を数える
    $error_count = 0;
    foreach($errors as $key => $value) {
        if($value !== ''){
            $error_count++;
        }
      }
    if ($error_count === 0){
        session_start();
        $model = new Person(
            $full_name, 
            $kana, 
            $gender, 
            $birth, 
            $address, 
            $phone, 
            $mail, 
            $password
        );
        $_SESSION['model'] = $model;
        
        header('Location: ./registConfirm.php');
        exit();
    }
    

}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../sample.css">
<meta charset="UTF-8">
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
        <input 
            type="text" 
            id="full_name" 
            name="full_name" 
            value="<?php if(isset($full_name)){echo $full_name;} ?>" 
            placeholder="例）田中太郎"
        >
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
        <input 
            type="text" 
            id="kana" 
            name="kana" 
            value="<?php if(isset($kana)){echo $kana;} ?>" 
            placeholder="例）たなかたろう"
        >
    </div>
    <br>
    <div>
        <label for="gender">性別</label>
        男性
        <input 
            type="radio" 
            id="gender" 
            name="gender" 
            value="男性" 
            checked <?php if(isset($gender)&&$gender==="男"){echo "checked";}?>
        >
        女性
        <input 
            type="radio" 
            id="gender" 
            name="gender" 
            value="女性" 
            <?php if(isset($gender)&&$gender==="女"){echo "checked";}?>
        >
        その他
        <input 
            type="radio" 
            id="gender" 
            name="gender" 
            value="その他" 
            <?php if(isset($gender)&&$gender==="その他"){echo "checked";}?>
        >
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
            // 形式チェック
            if(
                isset($_POST['confirm']) 
                && array_key_exists('birthFormat', $errors)
            ){
                echo '<p><font color="red">'.$errors['birthFormat'].'</font></p>';
            }
        ?>
        <label for="birth">生年月日</label>
        <input 
            type="text" 
            id="birth" 
            name="birth" 
            value="<?php if(isset($birth)){echo $birth;} ?>" 
            placeholder="例）2022/01/01" 
        >
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
        <input 
            type="text" 
            id="address" 
            name="address" 
            size="35" 
            value="<?php if(isset($address)){echo $address;} ?>" 
            placeholder="例）〇〇県〇〇市〇〇区1-1" 
        >
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
            // 形式チェック
            if(
                isset($_POST['confirm']) 
                && array_key_exists('phoneFormat', $errors)
            ){
                echo '<p><font color="red">'.$errors['phoneFormat'].'</font></p>';
            }
        ?>
        <label for="phone">電話番号</label>
        <input 
            type="text" 
            id="phone" 
            name="phone" 
            size="30" 
            value="<?php if(isset($phone)){echo $phone;} ?>" 
            placeholder="例）〇〇〇-〇〇〇〇-〇〇〇〇"
            >
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
            // 形式チェック
            if(
                isset($_POST['confirm']) 
                && array_key_exists('mailFormat', $errors)
            ){
                echo '<p><font color="red">'.$errors['mailFormat'].'</font></p>';
            }
        ?>
        <label for="mail">メールアドレス</label>
        <input 
            type="text" 
            id="mail" 
            name="mail" 
            size="30" 
            value="<?php if(isset($mail)){echo $mail;} ?>" 
            placeholder="例）info@example.com"
        >
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
            // 入力内容が一致するかどうか
            if(
                isset($_POST['confirm']) 
                && array_key_exists('mailMatch', $errors)
            ){
                echo '<p><font color="red">'.$errors['mailMatch'].'</font></p>';
            }
        ?>
        <label for="mail_confirm">メールアドレス確認用</label>
        <input 
            type="text" 
            id="mail_confirm" 
            name="mail_confirm" 
            size="30" 
            value="<?php if(isset($mail_confirm)){echo $mail_confirm;} ?>" 
            placeholder="例）info@example.com"
        >
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
            // 文字数
            if(
                isset($_POST['confirm']) 
                && 
                array_key_exists('passwordRange', $errors)
            ){
                echo '<p><font color="red">'.$errors['passwordRange'].'</font></p>';
            }
        ?>
        <label for="password">パスワード</label>
        <input 
            type="text" 
            id="password" 
            name="password" 
            value="<?php if(isset($password)){echo $password;} ?>" 
            placeholder="例）6~12文字以内"
        >
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
            // 入力内容が一致するかどうか
            if(
                isset($_POST['confirm']) 
                && array_key_exists('passwordMatch', $errors)
            ){
                echo '<p><font color="red">'.$errors['passwordMatch'].'</font></p>';
            }
        ?>
        <label for="password_confirm">パスワード確認用</label>
        <input 
            type="text" 
            id="password_confirm" 
            name="password_confirm" 
            value="<?php if(isset($password_confirm)){echo $password_confirm;} ?>"
            placeholder="例）6~12文字以内"
        >
    </div>
    <hr>
    <div>
        <input type="submit" name="confirm" value="登録情報確認へ">
    </div>
</form> 
</body>
</html>