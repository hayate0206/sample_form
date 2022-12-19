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

    if(isset($_POST['login'])){
        
        session_start();

        // POSTされたデータをエスケープ処理して変数に格納
        $mail = escape($_POST['mail']);
        $password = escape($_POST['password']);

        // ログイン時バリデーション
        $valid = new Valid();

        $emptyError = '必須入力です'; 
        $formatError = '正しい形式で入力してください'; 
        $passRangeError = '6~12文字で入力してください';
        $loginError = 'アカウント情報が間違っています';
        $errors = [];

        if(empty($mail)) {
            $errors["mailEmpty"] = $emptyError;
        }
        if(empty($password)){
            $errors['passwordEmpty'] = $emptyError;
        }
        if(!($valid->isFormat($mail, "mail"))){
            $errors['mailFormat'] = $formatError;
        }
        if(!($valid->isRange($password, 6, 12))){
            $errors['passwordRange'] = $passRangeError;
        }

        $db = new Db();                             // データベース接続
        $data = $db->getData($mail, $password);     // データベースから取得
        $connectionClose = $db->connectionClose();  // データベース切断
        if($data === false){
            $errors['loginError'] = $loginError;
        }else{
            // 遷移
            header('Location: ./index.php');
            exit();
        }
    }else if(isset($_POST['newMember'])){
        // 遷移
        header('Location: ./newMember.php');
        exit();
    }
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>SampleForm</title>
</head>
<body>
    <table>
        <form action="login.php" method="post">
            <tr class="title">
                <td></td>
                <td>
                    <h1>TOP</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <input 
                        type="text" 
                        name="mail" 
                        size="40" 
                        value="<?php if(isset($mail)){echo $mail;} ?>"
                        placeholder="メールアドレス"
                    >
                </td> 
                <td>
                    <?php
                        // 未入力、形式
                        if(
                            isset($_POST['login']) 
                            && array_key_exists('mailEmpty', $errors)
                        ){
                            echo '<p><font color="red">'.$errors['mailEmpty'].'</font></p>';
                        }
                        if(
                            isset($_POST['login']) 
                            && array_key_exists('mailFormat', $errors)
                        ){
                            echo '<p><font color="red">'.$errors['mailFormat'].'</font></p>';
                        }
                    ?>
                </td>  
            </tr>
            <tr>
                <td>
                    <input 
                        type="text" 
                        name="password" 
                        size="20" 
                        value="<?php if(isset($password)){echo $password;} ?>"
                        placeholder="6~12文字以内"
                    >
                </td>
                <td>
                    <?php
                        // 未入力、文字数
                        if(
                            isset($_POST['login']) 
                            && array_key_exists('passwordEmpty', $errors)
                        ){
                            echo '<p><font color="red">'.$errors['passwordEmpty'].'</font></p>';
                        }
                        if(
                            isset($_POST['login']) 
                            && 
                            array_key_exists('passwordRange', $errors)
                        ){
                            echo '<p><font color="red">'.$errors['passwordRange'].'</font></p>';
                        }
                    ?>
                </td>
            </tr>
            <td colspan="2"><hr></td>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="login" value="ログイン" />
                    <input type="submit" name="newMember" value="新規登録" />
                </td>
            </tr>
        </form>
    </table>
</body>
</html>