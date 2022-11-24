<?php
class Person {
    private $name;
    private $kana;
    private $gender;
    private $birth;
    private $address;
    private $phone;
    private $mail;
    private $mail_confirm;
    private $password;
    private $password_confirm;
    private $contact;
    private $created_at;

    public function __construct(
            $name, 
            $kana, 
            $gender, 
            $birth, 
            $address, 
            $phone, 
            $mail, 
            $mail_confirm, 
            $password, 
            $password_confirm, 
            $contact,
            $created_at
    ){
        $this->name = $name;
        $this->kana = $kana;
        $this->gender = $gender;
        $this->birth = $birth;
        $this->address = $address;
        $this->phone = $phone;
        $this->mail = $mail;
        $this->getMail_confirm = $mail_confirm;
        $this->password = $password;
        $this->password_confirm = $password_confirm;
        $this->contact = $contact;
        $this->created_at = $created_at;
    }


// setter
public function setName ($value) {
    $this->name = $value;
}
public function setKana ($value) {
    $this->kana = $value;
}
public function setGender ($value) {
    $this->gender = $value;
}
public function setBirth ($value) {
    $this->birth = $value;
}
public function setAddress ($value) {
    $this->address = $value;
}
public function setPhone ($value) {
    $this->phone = $value;
}
public function setMail ($value) {
    $this->mail = $value;
}
public function setMail_confirm ($value) {
    $this->mail_confirm = $value;
}
public function setPassword ($value) {
    $this->password = $value;
}
public function setPassword_confirm ($value) {
    $this->password_confirm = $value;
}
public function setContact ($value) {
    $this->contact = $value;
}
public function setCreated_at ($value) {
    $this->created_at = $value;
}

// getter
public function getName() {
    return $this->name;
}
public function getKana() {
    return $this->kana;
}
public function getGender() {
    return $this->gender;
}
public function getBirth() {
    return $this->birth;
}
public function getPhone() {
    return $this->phone;
}
public function getAddress() {
    return $this->address;
}
public function getMail() {
    return $this->mail;
}
public function getMail_confirm() {
    return $this->mail_confirm;
}
public function getPassword() {
    return $this->password;
}
public function getPassword_confirm() {
    return $this->password_confirm;
}
public function getContact() {
    return $this->contact;
}
public function getCreated_at() {
    return $this->created_at;
}
// nameを取得するgetterメソッド →　public function getName(){
//                               return $this->name;
// $taro = new Person('太郎', 25);
// echo $taro->getAge(); // 「25」と表示される
}