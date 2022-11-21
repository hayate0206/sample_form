<?php
class ContactModel{
    private $full_name;
    private $kana;
    private $gender;
    private $birth;
    private $address;
    private $phone;
    private $mail;
    private $mail_confirm;
    private $password;
    private $password_confirm;

    function __construct(
        $full_name, 
        $kana,
        $gender,
        $birth, 
        $address,
        $phone, 
        $mail, 
        $mail_confirm, 
        $password,
        $password_confirm
    ) {
        $this->full_name = $full_name;
        $this->kana = $kana;
        $this->gender = $gender;
        $this->birth = $birth;
        $this->address = $birth;
        $this->phone = $phone;
        $this->mail = $mail;
        $this->mail_confirm = $mail_confirm;
        $this->password = $password;
        $this->password_confirm = $password_confirm;
    }
    public function get_full_name(){
        return $this->full_name;
    }
    public function get_kana(){
        return $this->kana;
    }
    public function get_gender(){
        return $this->gender;
    }
    public function get_birth(){
        return $this->birth;
    }
    public function get_address(){
        return $this->address;
    }
    public function get_phone(){
        return $this->phone;
    }
    public function get_mail(){
        return $this->mail;
    }
    public function get_mail_confirm(){
        return $this->mail_confirm;
    }
    public function get_password(){
        return $this->password;
    }
    public function get_password_confirm(){
        return $this->password_confirm;
    }
}
?>