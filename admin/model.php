<?php
class Person {
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
    private $contact;
    private $created_at;
    private $check_color;

    public function __construct(
            $full_name, 
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
            $created_at, 
            $check_color
    ){
        $this->full_name = $full_name;
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
        $this->check_color = $check_color;
    }


    // setter
    // public function setFull_name ($value) {
    //     $this->full_name = $value;
    // }
    // public function setKana ($value) {
    //     $this->kana = $value;
    // }
    // public function setGender ($value) {
    //     $this->gender = $value;
    // }
    // public function setBirth ($value) {
    //     $this->birth = $value;
    // }
    // public function setAddress ($value) {
    //     $this->address = $value;
    // }
    // public function setPhone ($value) {
    //     $this->phone = $value;
    // }
    // public function setMail ($value) {
    //     $this->mail = $value;
    // }
    // public function setMail_confirm ($value) {
    //     $this->mail_confirm = $value;
    // }
    // public function setPassword ($value) {
    //     $this->password = $value;
    // }
    // public function setPassword_confirm ($value) {
    //     $this->password_confirm = $value;
    // }
    // public function setContact ($value) {
    //     $this->contact = $value;
    // }
    // public function setCreated_at ($value) {
    //     $this->created_at = $value;
    // }
    // public function setCheck_color ($value) {
    //     $this->check_color = $value;
    // }

    // getter
    public function getFull_name() {
        return $this->full_name;
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
    public function getCheck_color() {
        return $this->check_color;
    }
}