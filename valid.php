<?php
    require_once('./model.php');    //インポート

    class LoginValid{               // ログイン時の氏名又はメールアドレス,パスワード
    function Login($full_name, $mail, $password) {
        if(empty($full_name) || empty($mail)) {
            return '*名前又はメールアドレスは必須入力です';
        }elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            return '*正しいEメールアドレスを指定してください';
        } else {
            return "";
        }
        if (empty($password)){
            return '*パスワードは必須入力です';
        } else {
            return "";
        }
    }
    function RegisValid($full_name) {
        if(empty($full_name)) {
            return '*名前は必須入力です';
        } else {
            return "";
        }
        if (empty($kana)){
            return '*ふりがなは必須入力です';
        } else {
            return "";
        }
        if (empty($birth)){
            return '*生年月日は必須入力です';
        } else {
            return "";
        }
        if (empty($address)){
            return '*住所は必須入力です';
        } else {
            return "";
        }
        if (empty($phone)){
            return '*電話番号は必須入力です';
        } else {
            return "";
        }
        if (empty($mail)){
            return '*メールアドレスは必須入力です';
        } else {
            return "";
        }
        if (empty($mail_confirm)){
            return '*確認用メールアドレスは必須入力です';
        } else {
            return "";
        }
        if (empty($password)){
            return '*パスワードは必須入力です';
        } else {
            return "";
        }
        if (empty($password_confirm)){
            return '*確認用パスワードは必須入力です';
        } else {
            return "";
        }
    }
    }
?>