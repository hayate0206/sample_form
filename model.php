<?php
class Person {
    private $name;
    private $kana;
    private $phone;
    private $birth;
    private $gender;
    private $mail;
    private $mail_confirm;
    private $contact;

    public function __construct($name, $age, $phone, $birth, $gender, $mail, $mail_confirm, $contact){
        $this->name = $name;
        $this->age = $age;
        $this->phone = $phone;
        $this->birth = $birth;
        $this->gender = $gender;
        $this->mail = $mail;
        $this->getMail_confirm = $mail_confirm;
        $this->contact = $contact;
    }
}

// setter
public function setName ($value) {
    $this->name = $value;
}
public function setKana ($value) {
    $this->kana = $value;
}
public function setPhone ($value) {
    $this->phone = $value;
}
public function setBirth ($value) {
    $this->birth = $value;
}
public function setGender ($value) {
    $this->gender = $value;
}
public function setMail ($value) {
    $this->mail = $value;
}
public function setMail_confirm ($value) {
    $this->mail_confirm = $value;
}
public function setContact ($value) {
    $this->contact = $value;
}

// getter
public function getName() {
    return $this->name;
}
public function getKana() {
    return $this->kana;
}
public function getPhone() {
    return $this->phone;
}
public function getBirth() {
    return $this->birth;
}
public function getGender() {
    return $this->gender;
}
public function getMail() {
    return $this->mail;
}
public function getMail_confirm() {
    return $this->mail_confirm;
}
public function getContact() {
    return $this->contact;
}
// ageを取得するgetterメソッド →　public function getAge(){
//                               return $this->age;
// $taro = new Person('太郎', 25);
// echo $taro->getAge(); // 「25」と表示される