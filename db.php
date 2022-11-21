<?php
require_once('./model.php');    //インポート
class Db{
    private $db;
    function __construct(){     //データベース接続
        $dsn = 'mysql:host=localhost;dbname=sample_app2;charset=utf8';	//DSN(Data Source Name)
        $user = 'root';
        $pass = 'root';
        $this->db = new PDO($dsn, $user, $pass);	//PDO(PHP Data Objects)
    }
    function insert_sample_form(    //データベース登録
        $full_name, 
        $name_kana, 
        $gender, 
        $birth_date, 
        $address, 
        $phone_number, 
        $mail, 
        $password
    ){
        try {
            // INSERT文を変数に格納
            $sql = "INSERT INTO sample_form(
                    $full_name, 
                    $name_kana, 
                    $gender, 
                    $birth_date, 
                    $address, 
                    $phone_number, 
                    $mail,
                    $password
                )
                VALUES(
                    :full_name, 
                    :kana, 
                    :gender, 
                    :birth, 
                    :address,
                    :phone, 
                    :mail, 
                    :password
                )";
            
            //prepareメソッドはプリペアドステートメントと呼ばれるものを利用するための関数です。 
            //プリペアドステートメントとは、SQL文を最初に用意しておいて、
            //その後はクエリ内のパラメータの値だけを変更してクエリを実行できる機能

            // 挿入する値は空のまま、SQL実行の準備をする
            $stmt = $this->db->prepare($sql);
    
            // // 挿入する値を配列に格納する
            $params = [
                ':full_name' => $full_name,
                ':kana' => $name_kana, 
                ':gender' => (int)$gender, 
                ':birth' => $birth_date, 
                ':address' => $address, 
                ':phone' => $phone_number,
                ':mail' => $mail, 
                ':password' => $password
            ];
            // SQLを実行
            $stmt->execute($params);
            
            // 登録完了
            echo '登録完了しました';
        } catch(PDOException $e) {
            // 接続エラー
            die('DB接続エラー' . $e->getMessage());
        }
    }
}
?>
