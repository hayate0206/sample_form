<?php
    require_once('./model.php');    //インポート
    //...メールアドレス
    // 未入力
    // 正しい形式
    

    // ...パスワード
    // 未入力
    // 6-10文字以内

    class Valid{               // ログイン時バリデーション
        // 未入力
        function isEmpty($input) {
            if(empty($input)) {
                return false;
            } else {
                return true;
            }
        }
        // メールアドレスが正しい形式
        function isMailFormat($input) {
            if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
                return false;
            } else {
                return true;
            }
        }
        // 文字が範囲内か
        function isRange($input, $min, $max) {
            if ($input > $min && $input < $max) {
                return false;
            } else {
                return true;
            }
        }
    }
?>