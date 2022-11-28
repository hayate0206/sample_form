<?php
    require_once('./model.php');    //インポート

    // class クラス名(){
    //     const 定数名 = 値;
      
    //     function メソッド名(){
    //       print(self::定数名);
    //     }
    // }

    class Valid{
        const PHONE_FORMAT = '/^0[7-9]0-[0-9]{4}-[0-9]{4}$/';
        const BIRTH_FORMAT = '/^[1-9]{1}[0-9]{0,3}\/[0-9]{1,2}\/[0-9]{1,2}$/';
        
        // 正しい形式
        function isFormat($input, $type) {
            if ($type === "mail") {
                return filter_var($input, FILTER_VALIDATE_EMAIL);
            } else if ($type === "phone") {
                return preg_match(self::PHONE_FORMAT, $input);
            } else if ($type === "birth") {
                return preg_match(self::BIRTH_FORMAT, $input);
            } else {
                return '引数のtypeが間違っています。';
            }
        }


        // ＊条件が二択の時は下記のように(return...)省略して(直感的)書ける。

        // 文字が範囲内か
        function isRange($input, $min, $max) {
            return  (mb_strlen($input) >= $min && mb_strlen($input) <= $max) ;
            // if (
            //     mb_strlen($input)>= $min 
            //     && mb_strlen($input) <= $max
            // ) {
            //     return false;
            // } else {
            //     return true;
            // }
        }
        // Eメールアドレス,パスワードが確認用と一致するかどうか
        function isMatch($input, $match){
            return ($input !== $match);
            // if ($input !== $match){
            //     return false;
            // } else {
            //     return true;
            // }
        }
    }
?>