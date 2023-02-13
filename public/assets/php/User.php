<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of User
 *
 * @author student
 */
class User {

    protected $userName,
            $passwd,
            $userSurname,
            $login,
            $email,
            $phone,
            $adress;
    protected int $status;
    protected DateTime $date;
           
    const STATUS_USER = 1;
    const STATUS_ADMIN = 2;
    
    function __construct($userName, $userSurname,$login, $email, $passwd, $phone, $adress){
        
        $this->status=User::STATUS_USER;
        $this->userName=$userName;
        $this->userSurname=$userSurname;
        $this->login=$login;
        $this->email=$email;
        $this->phone=$phone;
        $this->adress=$adress;
        $this->date = new DateTime();
        $this->passwd =password_hash($passwd,PASSWORD_BCRYPT);
    }
    function setUser($status) {
        $this->status_admin = $STATUS_ADMIN; 
    }
    function toArray(){
        $arr = [
            "userName" => $this->userName,
            "userSurname" => $this->userSurname,
            "login" => $this->login,
            "passwd" => $this->passwd,
            "email" => $this->email,
            "phone" => $this->phone,
            "adress" => $this->adress//,
            //"date" => date_format($this->date, 'Y-m-d')
        ];
        return $arr;
    }

     function saveDB($db){
        /*$stmt = $bd->prepare("INSERT INTO USERS (login, pass) VALUES (?, ?)");
        $stmt->bindParam(1, $login); 
        $stmt->bindParam(2, $pass); 
        $login = 'ola'; 
        $pass = 'ola123'; 
        $stmt->execute();*/
        $dane = $this->toArray();  
        echo $db->insert("INSERT INTO users VALUES (NULL, '".$dane['userName']."', '".$dane['userSurname']."', '".$dane['login']."', '".$dane['passwd']."','".$dane['email']."', '".$dane['phone']."', '".$dane['adress']."')");
    }
    static function getAllUsersFromDB($db){
         //echo $bd->select("select UserName,fullName,email,passwd,status,date from klienci", ["userName","fullName","email","passwd","status","status"]); 
         echo $db->select("select userName,userSurname,login,email,phone,adress from users", ["userName","userSurname","login","email","phone","adress"]);
         
    }
    
    public function show() {
        echo $this->userName." ";
        echo $this->passwd." ";
        echo $this->userSurname." ";
        echo $this->email." ";
        echo $this->phone." ";
        echo $this->adress." ";
        //echo $this->date->format("m/d/Y")." ";
        //echo $this->status;
        echo "<br />";
    }
    public function setadress($adress){
        $this->adress=$adress;
    }
    public function getadress(){
        return $this->adress;
    }  
    public function setUserName($userName){
        $this->userName=$userName;
    }
    public function getUserName(){
        return $this->userName;
    }   
    public function setphone($phone){
        $this->phone=$phone;
    }
    public function getphone(){
        return $this->phone;
    }   
    
    public function setuserSurname($userSurname){
        $this->userSurname=$userSurname;
    }
    public function getuserSurname(){
        return $this->userSurname;
    }   
    
    public function getPasswd() {
        return $this->passwd;
    }

    public function getFullName() {
        return $this->fullName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getStatus(): int {
        return $this->status;
    }

    public function getDate(): DataTime {
        return $this->date;
    }
    public function setPasswd($passwd): void {
        $this->passwd = $passwd;
    }

    public function setFullName($fullName): void {
        $this->fullName = $fullName;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setStatus(int $status): void {
        $this->status = $status;
    }

    public function setDate(DataTime $date): void {
        $this->date = $date;
    }
    }
