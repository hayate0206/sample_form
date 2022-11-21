<?php
    if()
?>
<!doctype html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="title">
    <h1>新規会員登録</h1>
    </div>
    <div>
        <input type="text" name="name" size="40" placeholder="田中太郎">
    </div>
        <input type="text" name="kana" size="40" placeholder="タナカタロウ">
    </div>
        <input type="radio" name="gender">
    </div>
        <input type="text" name="birth_date" size="40" placeholder="1995/02/22">
    </div>
    <div>
        <input type="text" name="address" size="20" placeholder="住所">
    </div>
    <div>
        <input type="text" name="phone" value="08098764532" />
    </div>
        <input type="text" name="mail" size="40" placeholder="メールアドレス">
    </div>
        <input type="text" name="mail_c" size="40" placeholder="確認用メールアドレス">
    </div>
        <input type="text" name="pass" size="40" placeholder="パスワード">
    </div>
        <input type="text" name="pass_c" size="40" placeholder="確認用パスワード">
    </div>
    
</body>
    <div class="new">
        <span>登録確認画面へ</span>
    </div>
    <div>
        <input type="submit" name="back" value="戻る" />
        <input type="submit" name="confirm" value="確認画面へ" />
    </div>
</html>