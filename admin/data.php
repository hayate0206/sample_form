<?php
// require_once('./model.php');    //インポート
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

    // テーブルのデータを取得(SELECT文)
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
    // テーブルのid, created_at, contact_inputのみ取得(SELECT文)
    function getContactAll(){
        $sql = "
                SELECT id, created_at, contact_input 
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

    //データベース登録(INSERT文)
    function insert_sample_form(
        $full_name, 
        $name_kana, 
        $gender, 
        $birth_date, 
        $address, 
        $phone_number, 
        $mail, 
        $password, 
        $contact
    ){
        try {
            // INSERT文を変数に格納
            $sql = "INSERT INTO sample_form2(
                    $full_name, 
                    $name_kana, 
                    $gender, 
                    $birth_date, 
                    $address, 
                    $phone_number, 
                    $mail,
                    $password, 
                    $contact
                )
                VALUES(
                    :full_name, 
                    :kana, 
                    :gender, 
                    :birth, 
                    :address,
                    :phone, 
                    :mail, 
                    :password, 
                    :contact
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
                ':password' => $password, 
                ':contact' => $contact

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

    // データベース接続を閉じる
    function connectionClose(){
        $this->db = null;
    }
}
?>
