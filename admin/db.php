<?php
class Db{
    private $db;

    //データベース接続
    function __construct(){
        // $db = mysqli_connect('localhost', 'root', 'root', 'sample_app2');
        $dsn = 'mysql:host=localhost;dbname=sample_app2;charset=utf8';	//DSN(Data Source Name)
        $user = 'root';
        $pass = 'root';

        $this->db = new PDO($dsn, $user, $pass);	//PDO(PHP Data Objects)

        // if(mysqli_connect_errno()){
        // echo "エラー";
        // }else{
        // echo "成功";
        // }
    }

    // ------- テーブルのデータを取得 -------- ログイン
    function getData($mail, $password){
        $sql = "
                SELECT * 
                FROM sample_form 
                WHERE mail = ? 
                AND password = ?
        ";
    //prepareでSQL文をセット
        $sth = $this->db->prepare($sql);
    //executeで実行
        $param = [
            $mail,
            $password
        ];
        $sth->execute($param);
    //結果セットから取得
        $result = $sth->fetch();

        return $result;
    }

    // ------ テーブルのデータ全てを取得 ------ お問い合わせした人の詳細
    function getUserDetail($id){
        $sql = "
                SELECT * 
                FROM sample_form 
                WHERE id = ?
        ";
        //prepareでSQL文をセット
        $sth = $this->db->prepare($sql);
        //executeで実行
        $param = [
            $id
        ];
        $sth->execute($param);
        //結果セットから取得
        $result = $sth->fetch();
        return $result;
    }

    // ------ テーブルのデータ(id, created_at, contact_input)を取得 ------ 管理画面(ID,問い合わせ時刻、内容)
    function getContactInfo(){
        $sql = "
                SELECT id, created_at, contact_input, check_color 
                FROM sample_form 
        ";
    //prepareでSQL文をセット
        $sth = $this->db->prepare($sql);
    //executeで実行
        $sth->execute();
    //結果セットから取得
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    // -------- データベース登録 -------- 新規会員登録
    function infoRegist(
        $full_name, 
        $kana, 
        $gender, 
        $birth, 
        $address, 
        $phone, 
        $mail, 
        $password
    ){
        try {
            // INSERT文を変数に格納
            $sql = "INSERT INTO sample_form(
                    full_name, 
                    name_kana, 
                    gender, 
                    birth_date, 
                    address, 
                    phone_number, 
                    mail,
                    password
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

            // 挿入する値は空のまま、SQL実行の準備をする
            $stmt = $this->db->prepare($sql);
    
            // // 挿入する値を配列に格納する
            $params = [
                ':full_name' => $full_name,
                ':kana' => $kana, 
                ':gender' => (int)$gender, 
                ':birth' => $birth, 
                ':address' => $address, 
                ':phone' => $phone,
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

    // -------- データベース更新(UPDATE) -------- お問い合わせ詳細を確認し、確認ボタンを押したら
    function infoCheck(
        $id
    ){
        try {
            // UPDATE文を変数に格納
            $sql = "
                        UPDATE sample_form 
                        SET check_color = 1
                        WHERE id = :id;
                    ";
            // SQL実行の準備をする
            $stmt = $this->db->prepare($sql);
    
            // 挿入する値を配列に格納する
            $params = [
                ':id' => $id
            ];
            // SQLを実行
            $stmt->execute($params);
            
            // 登録完了
            echo '更新完了しました';
        } catch(PDOException $e) {
            // 接続エラー
            die('DB接続エラー' . $e->getMessage());
        }
    }
    
    // ------ データベース接続を閉じる -------
   function connectionClose(){
        $this->db = null;
    }

}
?>
