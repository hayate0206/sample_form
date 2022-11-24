<?php
    require_once('./valid.php'); 

    function escape($data){      //エスケープ処理

        $data = trim($data);        //　文字列の先頭と末尾から「半角スペース」や「Tab」を取り除く
                                    //  文字列の中から文字を指定して削除
        $data = stripslashes($data);     //　バックスラッシュを取り除く（\' → ' ）
        $data = htmlspecialchars($data);    //　HTMLの文字を無害にする
        return $data;
    }

    if(isset($_POST['login'])){

        // POSTされたデータをエスケープ処理して変数に格納
        $mail = escape($_POST['mail']);
        $password = escape($_POST['password']);

        $valid = new Valid();
        $mailIsEmpty = $valid->isEmpty($mail);
        $mailIsFormat = $valid->isMailFormat($mail);

        $passwordIsEmpty = $valid->isEmpty($password);
        $passwordIsRange = $valid->isRange($password, 6, 10);

        if($mailIsEmpty || $mailIsFormat || $passwordIsEmpty || $passwordIsRange){
            header('Location: ./index.php');
            exit();
        }
    }
?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>SampleForm</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="title">
        <h1>TOP</h1>
    </div>
    <div>
        <input 
            type="text" 
            name="mail" 
            size="40" 
            value=""
            placeholder="メールアドレス"
        >
    </div>
    <div>
        <input 
            type="text" 
            name="password" 
            size="20" 
            value=""
            placeholder="パスワード"
        >
    </div>
    <p></p>
    <div>
        <input type="submit" name="login" value="ログイン" />
    </div><div>
        <input type="submit" name="register" value="新規登録" />
    </div>
</body>
</html>